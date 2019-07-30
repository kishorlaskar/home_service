<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Booking;
use App\Client;
use App\service_provider;
use App\service_provider_sub_category;
use Validator;
use Input;

class ClientController extends Controller
{
   protected function home(Request $request){
   	$bookings =Booking::where('client_id',$request->session()->get('id'))->get();
    return view('Client.home',compact('bookings'));
   }

   protected function account_info(Request $request){
   	$client = Client::find($request->session()->get('id'));
   	return view('Client.account_info',compact('client'));
   }
   
   protected function edit_customer_info(Request $request){
       $client = Client::find($request->session()->get('id'));
       $data = $request->all();
       $provider_image=$request->file('provider_image');
       $client->name =$request->input('name');
        $client->address =preg_replace('/\s+/', '', $request->input('address'));
         $client->phone =$request->input('phone');
         if($provider_image){
        $data['provider_image']->storeAs('public/client_image',$request->session()->get('id').'.jpg');
      $client->photo =$request->session()->get('id').'.jpg';
    }
        
        $client->save();
        return redirect()->back();
   }

   protected function booking_service($sub_category_id,Request $request){
   	 $client = Client::find($request->session()->get('id'));
   	 $sub_ids = service_provider_sub_category::where('sub_category_id',$sub_category_id)->select('service_provider_id')->get();
   	 if (count($sub_ids )>0) {
   	 	foreach($sub_ids as $id){
   	 		$sub_id[]=$id->service_provider_id;
   	 	}

   	 	$unprob_address = service_provider::whereIn('id',$sub_id)->where('address','NOT LIKE',"%{$client->address}%");
   	 $profiles = service_provider::whereIn('id',$sub_id)->where('address','LIKE',"%{$client->address}%")->union($unprob_address)->get();
   	 }
   	 else{ $profiles = array();}
   	 
		
   	return view('Client.suggest_profile',compact('profiles','sub_category_id'));
   }

   protected function set_datetime($provider_id,$sub_category_id,Request $request){
     return view('Client.set_date_time',compact('provider_id','sub_category_id'));
   }

   protected function submit_datetime(Request $request){
   	 $date = $request->input('date');
   	 $time = $request->input('time');
   	 $provider_id = $request->input('provider_id');
   	 $sub_category_id = $request->input('sub_category_id');
   	 $booking = new Booking;
   	 $booking->client_id = $request->session()->get('id');
   	 $booking->service_provider_id = $provider_id;
   	 $booking->sub_category_id = $sub_category_id;
   	 $booking->sub_category_id = $sub_category_id;
   	 $booking->booking_date_time = $date.' '.$time;
   	 if ($booking->save()) {
   	   return redirect('customer/home');
   	 }
   	 else{
   	 	return redirect()->back();
   	 }

   }

   public function checkout(){
    return view('Client/checkout');
   }
}
