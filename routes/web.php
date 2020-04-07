<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::view('/test','order');
Route::get('/','LandingPageController@index');
Route::get('products/{category?}','ProductController@index')->name('products.index');
//show one product
Route::get('products/{product}/show','ProductController@show')->name('products.show');
//ge the cart view
Route::get('cart','CartController@index')->name('cart.index');
Route::post('cart','CartController@store')->name('cart.store');
Route::get('clearcart','CartController@destroy')->name('cart.clear');
Route::post('remove','CartController@remove')->name('cart.remove');


//Route to CheckoutController
Route::get('checkout','CheckoutController@index')->name('checkout.index');
Route::post('checkout','CheckoutController@create')->name('checkout.create')->middleware('auth');;
//SERVICE ROUTES
Route::get('service','ServiceController@index')->name('services.index');
Route::get('service/{service}','ServiceController@show')->name('service.show')->middleware('auth');
Route::post('service','ServiceController@message')->name('service.message')->middleware('auth');
Route::get('service/{service}/edit','VetController@edit')->name('vet.service.edit');
Route::put('service/{service}/update','VetController@update')->name('vet.service.update');
Route::get('service/{service}/remove','VetController@destroy')->name('vet.service.delete');
Route::get('vet/service/create','VetController@create')->name('vet.service.create');
Route::post('service/create','VetController@store')->name('vet.service.store');
Route::get('orders/vet/','VetController@orders')->name('vet.orders');
//Route to thankyou page
Route::get('thankyou',function(){
    Cart::clear();
  return view('thankyou');
})->name('thankyou');

//Route to show login form
Route::get('/login','Auth.LoginController@showLoginForm')->name('login');
//Route to register
Route::get('register',function(){

  return view('auth.register');
})->name('register');
//Route to admin home

//Route to vet home
Route::get('/vet/home','VetController@index')->name('vet.home');
Route::get('/vet/services','VetController@services')->name('vet.services');
Route::post('/vet/order/{order}/update','VetController@vetUpdate')->name('vet.order.update');
Route::get('/vet/profile','VetController@profile')->name('vet.profile');
//Route to agrovet home
Route::get('/agrovet/home','AgrovetController@index')->name('agrovet.home');
//Route
Route::get('/agovet/products','AgrovetController@products')->name('agrovet.products');
Route::get('/agovet/profile','AgrovetController@profile')->name('agrovet.profile');
Route::get('/agovet/account','AgrovetController@account')->name('agrovet.account');
Route::post('/agrovet','AgrovetController@create')->name('agrovet.create');
Route::put('/agrovet/{agrovet}','AgrovetController@updateAgrovet')->name('agrovet.update');

Route::get('/agrovet/product','AgrovetController@create_product')->name('agrovet.product.create');
Route::post('/agrovet/product','AgrovetController@store')->name('agrovet.product.store');
Route::get('/agrovet/product/{product}','AgrovetController@edit')->name('agrovet.product.edit');
Route::put('/agrovet/product/{product}','AgrovetController@update')->name('agrovet.product.update');
Route::get('/agrovet/product/{product}/remove','AgrovetController@destroy')->name('agrovet.product.delete');

//user Routes
Route::get('/user/profile','UserController@profile')->name('user.profile');
//route to view an order
Route::get('/order/{order}','OrderController@show')->name('order.show');

//Vet Routes
//Authentication routes
Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');
//Routes to update user profile 

Route::put('/profile/name/edit','ProfileController@name')->name('profile.update.name');

Route::put('/profile/email/edit','ProfileController@email')->name('profile.email.update');


//Routes to withdraw 
Route::post('/withdraw','WithdrawController@withdraw')->name('account.withdraw');

//Route to subscribe
Route::post('/subscribe','UserController@subscribe')->name('user.subscribe');

//admin routes 

Route::prefix('admin')->group(function(){
Route::get('/','AdminController@index')->name('admin.home')->middleware('auth');
Route::get('/agrovets','AdminController@agrovets')->name('admin.agrovets');
Route::get('/customers','AdminController@customers')->name('admin.customers');
Route::get('/orders','AdminController@orders')->name('admin.orders');
Route::get('/payments','AdminController@payments')->name('admin.payments');
Route::get('/providers','AdminController@providers')->name('admin.providers');
Route::get('/revenue','AdminController@revenue')->name('admin.revenue');
Route::get('/services','AdminController@services')->name('admin.services');
Route::get('/withdrawals','AdminController@withdrawals')->name('admin.withdrawals');
Route::get('/report','AdminController@report')->name('admin.report');
Route::get('/user/{user}/show','AdminController@show')->name('admin.user.show');
Route::put('/user/{user}/update','AdminController@update')->name('admin.user.update');
Route::get('/user/{user}/remove','AdminController@destroy')->name('admin.users.destroy');

Route::get('/revenue/{revenue}/destroy','AdminController@destroyRevenue')->name('revenue.destroy');
Route::get('/agrovet/{agrovet}/view','AdminController@agrovetView')->name('admin.agrovet.view');
Route::put('/agrovet/{agrovet}/edit','AdminController@agrovetEdit')->name('admin.agrovet.edit');

Route::get('/agrovet/{agrovet}/remove','AdminController@agrovetDelete')->name('admin.agrovet.destroy');

Route::get('/provider/{provider}/view','AdminController@ProviderView')->name('admin.provider.view');


Route::get('/provider/{provider}/remove','AdminController@ProviderDestroy')->name('admin.provider.delete');


Route::get('/service/{service}/edit','AdminController@ServiceEdit')->name('admin.service.edit');
Route::get('/service/{service}/remove','ServiceController@destroy')->name('admin.service.destroy');

Route::get('/withdraw/{withdraw}/remove','AdminController@destroyWithdraw')->name('withdraw.destroy');

Route::put('/order/{order}/update','AdminController@updateOrder')->name('order.update.status');

});