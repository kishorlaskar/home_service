<?php
 

Route::get('404page',function(){return view('404_error');});
Route::get('/','HomeController@index');
Route::get('view_details/{id}','HomeController@view_details');
Route::get('view_details/{id}','HomeController@view_details')->name('view_details');


//service_provider.........................
Route::get('service_provider/login',function(){return view('auth.provider_login');})->name('provider_login');
Route::post('service_provider/login','Auth\LoginController@provider_login')->name('provider_login');

Route::get('service_provider/register',function(){return view('auth.provider_register');})->name('provider_register');
Route::post('service_provider/register','Auth\RegisterController@provider_register')->name('provider_register');
Route::prefix('service_provider')->group(function () {
	//start service_provider middleware.........
 Route::middleware('service_provider')->group(function () {
   Route::get('home','ProviderController@home');
   Route::post('home','ProviderController@add_service')->name('home');
   Route::get('account_info','ProviderController@account_info');
   Route::post('edit_provider_info','ProviderController@edit_provider_info')->name('edit_provider_info');
    Route::post('change_status','ProviderController@change_status')->name('change_status');
    Route::get('delete_provider_cat/{id}','ProviderController@delete_provider_cat')->name('delete_provider_cat');
});   
//end service_provider middleware................
});


//Admin................................
Route::get('admin/login',function(){return view('auth.admin_login');})->name('admin_login');
Route::post('admin/login','Auth\LoginController@admin_login')->name('admin_login');
Route::prefix('admin')->group(function () {
	//start admin middleware.........
 Route::middleware('admin')->group(function () {
   Route::get('home','AdminController@home');
   Route::get('main_category','AdminController@main_category');
   Route::post('main_category','AdminController@add_category');
   Route::post('delete_category','AdminController@delete_category');
   Route::get('sub_category','AdminController@sub_category');
   Route::get('add_sub_category','AdminController@add_sub_category');
   Route::post('add_sub_category','AdminController@submit_category_info')->name('add_sub_category');
   Route::post('delete_subcategory','AdminController@delete_subcategory');
   Route::get('client_list','AdminController@client_list');
   Route::get('view_client_info/{id}','AdminController@view_client_info')->name('view_client_info');
   Route::post('delete_client','AdminController@delete_client')->name('delete_client');
   Route::get('service_provider_list','AdminController@service_provider_list');
});   
//end admin middleware................
});


//Client.............................
Route::get('customer/login',function(){return view('auth.client_login');})->name('client_login');
Route::post('customer/login','Auth\LoginController@client_login')->name('client_login');
Route::get('customer/register',function(){return view('auth.client_register');})->name('customer_register');
Route::post('customer/register','Auth\RegisterController@customer_register')->name('customer_register');
Route::prefix('customer')->group(function () {
  //start Client middleware.........
 Route::middleware('client')->group(function () {
  Route::get('home','ClientController@home');
  Route::get('account_info','ClientController@account_info');
  Route::post('edit_customer_info','ClientController@edit_customer_info')->name('edit_customer_info');
  Route::get('booking_service/{id}','ClientController@booking_service')->name('booking_service');
  Route::get('set_datetime/{id}/{sub_category_id}','ClientController@set_datetime')->name('set_datetime');
  Route::post('set_datetime','ClientController@submit_datetime')->name('submit_datetime');

  Route::get('checkout','ClientController@checkout')->name('customer/checkout');
});   
//end Client middleware................
});

Auth::routes();
