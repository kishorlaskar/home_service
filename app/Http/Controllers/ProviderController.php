<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Category;
use App\Sub_category;
use App\service_provider;
use App\service_provider_sub_category;
use App\Booking;
use Illuminate\Support\Facades\DB;

class ProviderController extends Controller
{
   protected function home(Request $request){
   	 $provider = service_provider::find($request->session()->get('id'));
   	 $bookings = Booking::where('service_provider_id',$request->session()->get('id'))->orderBy('id', 'DESC')->get();
   	$categories =Category::all();
   	$sub_categories =Sub_category::all();
   	return view('Provider.home',compact('categories','bookings','sub_categories','provider'));
   }
   protected function add_service(Request $request){
   	$id= $request->session()->get('id');
   	$service_provider_data=new service_provider_sub_category;
    $service_provider_data->service_provider_id=$id;
    $service_provider_data->sub_category_id=$request->input('sub_category');
    $service_provider_data->resources=$request->input('resource');
    $service_provider_data->save();
    return redirect()->back();
   }
 public function change_status(Request $request){
     $booking_id= $request->input('id');
      $status= $request->input('status');
      $booking = Booking::find($booking_id);
      if($status == 'Panding'){
      $booking->status='<span class="btn-primary">'.$status.'</span>';
      }
      
      elseif($status == 'Accept'){
      $booking->status='<span class="btn-info" style="background-color:#8ecc17">'.$status.'</span>';
      }
      elseif($status == 'Complete'){
      $booking->status='<span class="btn-success">'.$status.'</span>';
      }
      else{
      $booking->status='<span class="btn-danger">'.$status.'</span>';
      }
   
      $booking->save();
      return redirect()->back();
 }
   protected function account_info(Request $request){
   	$provider = service_provider::find($request->session()->get('id'));
   	return view('Provider.account_info',compact('provider'));
   }
   public function delete_provider_cat($id){
      DB::table('service_provider_sub_category')->where('id',$id)->delete();
      return redirect()->back();
   }
    
   protected function edit_provider_info(Request $request){
        $provider = service_provider::find($request->session()->get('id'));
        $data = $request->all();
        $provider_image=$request->file('provider_image');
       $provider->name =$request->input('name');
        $provider->address =preg_replace('/\s+/', '', $request->input('address'));
         $provider->phone =$request->input('phone');
         if($provider_image){
         $data['provider_image']->storeAs('public/provider_image',$request->session()->get('id').'.jpg');
         $provider->photo =$request->session()->get('id').'.jpg';
       }
        
        $provider->save();
        return redirect()->back();
   }
}
