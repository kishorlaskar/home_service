<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use App\Category;
use App\Sub_category;
use App\Client;
use App\service_provider;
use App\Booking;
use Validator;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
   protected function home(){
   	$datetime=array();$booking=array();$service_providers=array();$clients=array();
   	for ($i=10; $i >=0 ; $i--) { 
   		$datetime[]=date( 'Y-m-d', strtotime(date ( 'Y-m-d') . ' -'.$i.' day' ) );
   		$bookings[]=Booking::where('created_at','like','%'.$datetime[10-$i].'%')->count();
   		$service_providers[]=service_provider::where('created_at','like','%'.$datetime[10-$i].'%')->count();
   		$clients[]=Client::where('created_at','like','%'.$datetime[10-$i].'%')->count();
   	}
   	return view('Admin.home',compact('datetime','bookings','service_providers','clients'));
   }

   protected function main_category(){
   	$categorys = Category::all();
   	return view('Admin.main_category',compact('categorys'));
   }

   protected function add_category(Request $request){
   	$category_name = $request->category;
   	$exist = Category::where('category_name',$category_name)->first();
    if ($exist) {
    	return '111';
    }
    else{
    	$category= new Category;
    	$category->category_name=$category_name;
    	$category->save();
    	$categorys = Category::all();
    	$data = '<table class="table"> <tr><th>ID</th><th>Category Name</th><th>Action</th> </tr>';
        $i=1;
    	foreach ($categorys as $category) {
    		$data =$data.'<tr> <td>'.$i.'</td><td>'.$category->category_name.'</td><td><button class="btn btn-danger" id="'.$category->id.'" onclick="delete_cat(this.id)">Delete</button></td> </tr>';
            $i++;
    	}
        $data =$data .'</table>';
        return $data;
    }
   }

   function delete_category(Request $request){
   	 $category = Category::find($request->cat_id);
   	 if ($category->delete()) {
   	 	$categorys = Category::all();
    	$data = '<table class="table"> <tr><th>ID</th><th>Category Name</th><th>Action</th> </tr>';
        $i=1;
    	foreach ($categorys as $category) {
    		$data =$data.'<tr> <td>'.$i.'</td><td>'.$category->category_name.'</td><td><button class="btn btn-danger" id="'.$category->id.'" onclick="delete_cat(this.id)">Delete</button></td> </tr>';
            $i++;
    	}
        $data =$data .'</table>';
        return $data;
   	 }
   	 else{
   	 	return '111';
   	 }
   }

   function sub_category(){
   	$categorys = Category::all();
   	return view('Admin.sub_category',compact('categorys'));
   }

   function add_sub_category(){
      $categorys = Category::all();
   	  return view('Admin.add_sub_category',compact('categorys'));
   }
   function submit_category_info(Request $request){
    $data = $request->all();
   	$sub_category = new Sub_category; $i=0;
   	foreach ($data as $key => $value) {
   		if($i !=0){
   			$sub_category->$key = $value;
   		}
   		$i++;
   	}
   	if ($sub_category->save()) {
   		  	$data['photo']->storeAs('public/post_image',$sub_category->id.'.jpg');
   		  	return redirect('admin/sub_category');
   	}
   	else{
   		return redirect()->back();
   	}
 
   }

   public function delete_subcategory(Request $request){
   	 $sub_category = Sub_category::find($request->subcat_id);
   	 if ($sub_category->delete()) {
   	 	unlink("storage/app/public/post_image/$request->subcat_id.jpg");
   	 	$categorys = Category::all();
        $data='<table class="table"><tr><th>ID</th><th>Category</th><th>Photo</th> <th>Sub Category</th><th>Action</th> </tr>';
         $i=1;$p=0;
         if(count($categorys)>0){
            foreach($categorys as $category){
               $p=0;$add_data='';
                 if(count($category->sub_category)>0){
                    foreach($category->sub_category as $sub_category){
                       $add_data .=' <td>photo11</td>
                                   <td>'.$sub_category->sub_category_name.'</td>
                                  <td><button class="btn btn-danger" id="'.$sub_category->id.'" onclick="delete_subcat(this.id)">Delete</button></td></tr><tr>' ;
                                  $p++;   
                    }}
                else{
                 $p=1;$add_data='<td></td><td></td><td></td>';
                   }
                   $data .='<tr><td rowspan="'.$p.'">'.$i.'</td><td rowspan="'.$p.'">'.$category->category_name.'</td>'.$add_data.'</tr>';
                  $i++;
            }
        }
       $data.='</table>';
       return $data;
   	 }
   	 else{
   	 	return '111';
   	 }
   }


   public function client_list(){
   	$clients = Client::paginate(15);
   	return view('Admin.client_list',compact('clients'));
   }

	public function view_client_info($id){
      $client = Client::find($id);
      return view('Admin.view_client_info',compact('client'));
	}

   public function delete_client(Request $request){
   	 $client = Client::find($request->input('client_id'));
   	 if ($client->delete()) {
   	 	return redirect()->back();
   	 }
   	 else{
   	 	return 'There have error Please try Again !!';
   	 }
   }

   public function service_provider_list(){
   	$providers = service_provider::paginate(15);
   	return view('Admin.provider_list',compact('providers'));
   }
}
