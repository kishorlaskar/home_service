<?php

namespace App\Http\Controllers\Auth;

use App\Client;
use App\service_provider;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:12',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }


    protected function customer_register(Request $request){
         $data = $request->all();
         $client = new Client;
         $client->name=$data['name'];
         $client->email=$data['email'];
         $client->phone=$data['phone'];
         $client->password=Hash::make($data['password']);
      if ($client->save()) {
                session(['Client'=>true,'auth'=>true,'id'=>$client->id,'name'=>$data['name']]);
               return redirect('customer/home');
            }
            else{
                $error=['password'=>'Password is not correct !!','email'=>'email is not correct !!'];
                return redirect()->back()->withErrors($error); 
            }
    }


     protected function provider_register(Request $request){
        $data = $request->all();
         $service_provider = new service_provider;
         $service_provider->name=$data['name'];
         $service_provider->email=$data['email'];
         $service_provider->phone=$data['phone'];
         $service_provider->password=Hash::make($data['password']);
      if ($service_provider->save()) {
                session(['Service_provider'=>true,'auth'=>true,'id'=>$service_provider->id,'name'=>$data['name']]);
               return redirect('service_provider/home');
            }
            else{
                $error=['password'=>'Password is not correct !!','email'=>'email is not correct !!'];
                return redirect()->back()->withErrors($error); 
            }
    }
}
