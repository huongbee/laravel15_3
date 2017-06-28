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

Route::get('sua_bang_bang_san_pham','PageController@getEditTable');

Route::get('rename_bang_bang_san_pham','PageController@getRenameTable');

Route::get('xoa_bang_slide','PageController@getDropTable');

Route::get('them_data_product','PageController@insertData');



Route::get('get-product',[
	'as'=>'get_product', //tên route
	'uses'=>'PageController@getProduct' //gọi controller
]);


Route::get('update-customer',[
	'as'=>'update_customer', //tên route
	'uses'=>'PageController@getUpdateCustomer' //gọi controller
]);

Route::get('insert-user',[
	'as'=>'insert', //tên route
	'uses'=>'PageController@getInsertUser' //gọi controller
]);

Route::get('delete-user',[
	'as'=>'delete', //tên route
	'uses'=>'PageController@getDeleteUser' //gọi controller
]);



Route::group(['prefix'=>'eloquent'],function(){
	Route::get('get-san-pham',[
		'as'=>'ds_sp',
		'uses'=>'HomeController@getIndex'
	]);
	Route::get('get-khach-hang',[
		'as'=>'ds_kh',
		'uses'=>'HomeController@getCustomer'
	]);



	Route::get('add-san-pham',[
		'as'=>'add_sp',
		'uses'=>'HomeController@getAddProduct'
	]);


	Route::get('edit-san-pham/{id}',[
		'as'=>'edit_sp',
		'uses'=>'HomeController@getEditProduct'
	]);

	Route::get('delete-san-pham/{id}',[
		'as'=>'delete_sp',
		'uses'=>'HomeController@getDeleteProduct'
	]);

	Route::get('get-bill/{id}',[
		'as'=>'get_bill',
		'uses'=>'HomeController@getBill'
	]);

	Route::get('get-bill-of-customer/{id}',[
		'as'=>'get_bill_customer',
		'uses'=>'HomeController@getBillOfCustomer'
	]);

	Route::get('get-product-by-idtype/{id}',[
		'as'=>'get_product_by_type',
		'uses'=>'HomeController@getProductByType'
	]);

	Route::get('get-product-by-idbill/{id}',[
		'as'=>'get_product_by_bill',
		'uses'=>'HomeController@getProductByBill'
	]);


	Route::get('get-bill-by-idproduct/{id}',[
		'as'=>'get_bill_by_product',
		'uses'=>'HomeController@getBillByProduct'
	]);


	Route::get('get-billdetail-by-idcustomer/{id}',[
		'as'=>'get_billdetail_by_customer',
		'uses'=>'HomeController@getBillDetailByCustomer'
	]);

});






Route::get('login',[
	'as'=>'login',
	'uses'=>'PageController@getViewLogin'
]);
Route::post('admin',[
	'as'=>'quantri',
	'uses'=>'PageController@getAdmin'
]);

Route::group(['middleware'=>'checkLogin'],function(){
	

	Route::get('edit-info',[
		'as'=>'edit-info',
		'uses'=>'PageController@getEditInfo'
	]);
	

	Route::get('logout',[
		'as'=>'logout',
		'uses'=>'PageController@getLogout'
	]);

});
