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

Route::get('/', function () {
    return view('auth.login');
});



Route::get('/test','Controller@test');

Route::get('/billsuccess', function () {
    return view('user.billsuccess');
});

Route::get('/a', function () {
    return view('test');

});
Route::auth();

Route::group(['middleware' => ['auth']], function () {



    Route::get('/logout', 'Auth\LoginController@logout');
    Route::get('/home', 'HomeController@index');
    Route::get('store', 'Controller@store');
    Route::get('/outofstock','Controller@outofstock');
    Route::get('store/delete/{id}', 'ProductController@deleteQuestion');
    Route::get('insertdata', 'ProductController@insertdata');
    Route::post('postdata', 'ProductController@postdata');

    Route::post('billdata', 'BillController@billdata');
    Route::post('savebill','BillController@savebill');

    Route::get('/bill', 'BillController@query');


    Route::get('regiscustomer', 'CustomerController@regiscustomer');
    Route::post('customer', 'CustomerController@customer');
    Route::get('success', 'Controller@success');

//edit
    Route::get('edit.{products_id}', 'ProductController@edit');
    Route::post('postEdit', 'Productcontroller@postEdit');

//delete
    Route::get('delete', 'ProductController@delete');
    Route::post('delete', 'ProductController@postDelete');

//search data
    // Route::post('/store', 'ProductController@postSearch');
    Route::post('/store','Controller@searchdata');

//pdf

    Route::get('pdf.{id}','PDFController@pdf');
//TransportController
    Route::get('/transport','TransportController@transport');
    Route::post('/transport','TransportController@status');
    Route::get('billprevious.{id}','TransportController@billprevious');
    Route::get('/gettran','TransportController@gettran');
    Route::get('/posttran','TransportController@posttran');
    Route::post('upload', 'Controller@upload');


//SearchController
    Route::get('/index','SearchController@index');
    Route::get('/search','SearchController@search');
    Route::post('/search','SearchController@search');
    Route::get('/buystore','SearchController@search2');

//excel
    Route::get('items/export', 'ProductController@export');
    Route::post('postImport', 'ProductController@import');

    Route::get('/fileexcel','Productcontroller@fileexcel');
//caldistance
    Route::get('/caldistance','DistanceController@caldistance');
    Route::get('/bestseller','Controller@bestseller');
//profile
    Route::get('/profile','Controller@profile');
    Route::post('/postprofile','ProfileController@postprofile');

    Route::get('pdf','PDFController@pdf');
    // Route::get('/transport','PDFController@transport');

//autocomplete
    // Route::get('/buystore',array('as' => 'autocomplete','uses' => 'BillController@buystore'));
    // Route::get('/autocomplete',array('as' => 'autocomplete','uses' => 'BillController@autocomplete'));

 //SearchController
    Route::get('/index','SearchController@index');
    Route::get('/search','SearchController@search');
   
    Route::get('/search2','SearchController@search2');
//สินค้าขายดี
    Route::get('/bestproduct','Controller@bestproduct');

});

// Route::get('navbar','Controller@navbar');
// Route::get('/home', 'HomeController@index');

// Route::get('login','LoginController@login');


Route::get('/testline','Controller@testline');
Route::get('hello','Controller@show');




