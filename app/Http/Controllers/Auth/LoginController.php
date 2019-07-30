<?php

namespace App\Http\Controllers\Auth;
use App\service_provider;
use App\Client;
use App\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Hash;
class LoginController 
{
  

    public function provider_login(Request $request){
        $email=$request->input('email');
        $password=$request->input('password');
        $data=service_provider::where('email',$email)->first();
        if ($data != null) {
            if (Hash::check($password, $data->password)) {
                session(['Service_provider'=>true,'auth'=>true,'id'=>$data->id,'name'=>$data->name]);
               return redirect('service_provider/home');
            }
            else{
                $error=['password'=>'Password is not correct !!'];
                return redirect()->back()->withErrors($error); 
            }
        }
        else{
            $error=['email'=>'Email is not correct !!'];
            return redirect()->back()->withErrors($error);
        }
        
    }

     public function admin_login(Request $request){
        $email=$request->input('email');
        $password=$request->input('password');
        $data=Admin::where('email',$email)->first();
        if ($data != null) {
            if (Hash::check($password, $data->password)) {
                session(['Admin'=>true,'auth'=>true,'id'=>$data->id,'name'=>$data->name]);
               return redirect('admin/home');
            }
            else{
                $error=['password'=>'Password is not correct !!'];
                return redirect()->back()->withErrors($error); 
            }
        }
        else{
            $error=['email'=>'Email is not correct !!'];
            return redirect()->back()->withErrors($error);
        }
    }

    public function client_login(Request $request){
        $email=$request->input('email');
        $password=$request->input('password');
        $data=Client::where('email',$email)->first();
        if ($data != null) {
            if (Hash::check($password, $data->password)) {
                session(['Client'=>true,'auth'=>true,'id'=>$data->id,'name'=>$data->name]);
               return redirect('customer/home');
            }
            else{
                $error=['password'=>'Password is not correct !!'];
                return redirect()->back()->withErrors($error); 
            }
        }
        else{
            $error=['email'=>'Email is not correct !!'];
            return redirect()->back()->withErrors($error);
        }
    }

    public function logout(Request $request){
            $request->session()->flush();
            return redirect('/');
    }


}
