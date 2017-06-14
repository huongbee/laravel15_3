<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Schema;


class PageController extends Controller
{
	//c1
    public function getLogin($user){
    	echo $user;
    }
    //c2
    public function getLoginC2(Request $request){
    	$user = $request->user; //nhận tham số user từ URL
    	return view('view1',compact('user'));
    }

    // public function getData(Request $request){
    //	echo $request->url(); 
    // }

    public function getData(Request $request){
    	if($request->isMethod('post')){
    		echo "Đây là phương thức post";
    	}
    	else{
    		echo "Đây không phải là phương thức post";
    	}
    }


    public function getViewLogin(){
    	return view('form_data');
    }

    public function postViewLogin(Request $req){
    	$form = $req->all();//->toJson();
    	print_r(($form));
    	/*echo $user = $req->input('username.1'); // username:lấy từ form ở view form_data
    	echo "<br>";
    	echo $pass = $req->password; //password: lấy từ form ở view form_data*/
    }


    public function setCookie(){
    	$response = new Response;

    	$response->withCookie(
    		'khoahoc', //tên cookie
    		'Laravel', //giá trị của cookie 
    		'1' //thời gian tồn tại - phút
    	);
    	return $response;
    }

    public function getCookie(Request $req){
    	echo $req->cookie('khoahoc');
    }



    public function setSession(Request $req){
    	$session = session('key', 'value');  //key:tên session; value:giá trị của session
    	return view('view1');

    }
    public function getSession(Request $req){
    	return redirect()->back()->with('message','Đã tạo session');
    }



    public function getIndex(){
        return view('trangchu');
    }

    public function getChitiet(){

        return view('chitietsp');
    }

    public function getTaobang(){
        Schema::create('slide', function ($table) {
            $table->increments('id'); //Tự tăng, khóa chính
            $table->string('hinh'); //Kiểu chuỗi
            $table->integer('Gia'); //Kiểu int
            $table->timestamps(); //Tự cập nhật thời gian
        }); 
        echo 'thành công';
    }

}
