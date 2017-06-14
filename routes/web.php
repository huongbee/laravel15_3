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
    return view('welcome');
});


// Route::get('test',function (){
// 	echo 234567;
// });

Route::get('test/{name}',function ($ten){
	echo 'Chào bạn '.$ten;
})->where('name', '[0-9a-zA-Z]{6}'); //min: 6 chữ số, max:32 chữ số


//c1
Route::get('dinhdanh',function (){
	echo 'Chào bạn A';
})->name('tenroute');

//c2
Route::get('dinhdanh2',[
	'as'=>'tenroute2',
	function(){
		echo 1121;
	}
]);


Route::get('goiroute',function(){
	return redirect()->route('tenroute2');
});



Route::group(['prefix'=>'admin'],function(){
	
	Route::get('trangchu',function(){ // admin/trangchu
		echo 'Đây là trang chủ';
	});

	Route::get('gioithieu',function(){ // admin/gioithieu
		echo 'Đây là trang giới thiệu';
	});

});


Route::get('login/{user}',[
	'as'=>'login2', //đặt tên cho route: tên là login
	'uses'=>'PageController@getLoginC2' //gọi controller và sử dụng pt getLogin
]);


Route::get('geturi','PageController@getData');


Route::get('login','PageController@getViewLogin');
Route::post('login',[
	'as'=>'login',
	'uses'=>'PageController@postViewLogin'
]);



//set cookie: tạo cookie
Route::get('set-cookie','PageController@setCookie');

//get cookie: lấy cookie
Route::get('get-cookie','PageController@getCookie');


//set session: tạo session
Route::get('set-session','PageController@setSession');

//get session: lấy session
Route::post('get-session','PageController@getSession')->name('session');



Route::get('check_view',function(){
	if(view()->exists('view2')){
		echo 'có tồn tại view';
	}
	else{
		echo 'chưa có view này';
	}
});


View::share('name','Khoa Phạm'); //$name= 'Khoa Phạm';
Route::get('test_share_view',function(){
	return view('view2');
});

Route::get('trangchu','PageController@getIndex');

Route::get('chitietsanpham','PageController@getChitiet');



Route::get('tao_bang_bang_san_pham','PageController@getTaobang');


