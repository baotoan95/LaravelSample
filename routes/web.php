<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/welcome', function() {
	return "<h1>Welcome to my website</h1>";
});

Route::get('/hello/{name}', function($name) {
	return "Hello " . $name;
});

Route::get('/greeting/{name?}', function($name = 'there') {
	return "Hello " . $name;
});

Route::get('/add/{a}/{b}', function($a, $b) {
	return $a + $b;
})->where(['a'=>'[0-9]+', 'b' => '[0-9]+']);

// Dinh danh

Route::get('/ask', function() {
	return "What do you want to see?";
})->name('asker');

Route::get('/show', function() {
	return redirect() -> route('asker');
});

// Group
// Call: group/subdomain
Route::group(['prefix' => 'Admin'], function() {
	Route::get('/Categories', function() {
		return "Manage categories";
	});
	Route::get('/Users', function() {
		return "Manage users";
	});
	Route::get('/Products', function() {
		return "Manage products";
	});
});

// Call controller
Route::get('/XinChao', 'MyController@XinChao');

Route::get('/MayTinh/{a}/{b}', 'MyController@MayTinh');

// Send request
Route::get('/GetUrl', 'MyController@GetUrl');

Route::get('/getForm', function() {
	return view('myForm');
});

Route::post('/GetName', ['as' => 'GetName', 'uses' => 'MyController@getName']);

// Cookie
Route::get('setCookie', 'MyController@setCookie');
Route::get('getCookie', 'MyController@getCookie');

// Upload file
Route::get('/uploadForm', function() {
	return view('uploadForm');
});

Route::post('uploadFile', ['as'=>'uploadFile', 'uses'=>'MyController@uploadFile']);

// Get json
Route::get('getJson', 'MyController@getJson');

// Get view
Route::get('getMyView', 'MyController@getMyView');

Route::get('showTime/{time}', 'MyController@showTime');

View::share('name', 'Bao Toan');

// Master layout
Route::get('layout', function() {
	return view('pages.index');
});

Route::get('BladeTemplate/{viewName}', 'MyController@blade');

Route::get('GetHello/{name}', 'MyController@getHello');

Route::get('DemoCondition', 'MyController@demoCondition');



// Database
Route::get('database', function() {
	// Schema::create('Categories', function($table) {
	// 	$table->increments('id');
	// 	$table->string('name', 100);
	// });

	Schema::create('Products', function($table) {
		$table->increments('id');
		$table->string('name');
		$table->double('price')->default('0')->nullable();
		$table->integer('category')->unsigned();
		$table->foreign('category')->references('id')->on('Categories');
	});

	echo "Create table successful";
});