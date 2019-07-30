<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Sub_category;
class HomeController extends Controller
{
   
    public function index()
    {
      $categories = Category::all();
      $random_categories =Category::inRandomOrder()->limit(5)->get();
      return view('index',compact('categories','random_categories'));
      
    }

    public function view_details($id){
        $sub_category = Sub_category::find($id);
        if($sub_category){
          return view('view_details',compact('sub_category'));
        }
        else{
            return redirect('404page');
        }
    }

   

}
