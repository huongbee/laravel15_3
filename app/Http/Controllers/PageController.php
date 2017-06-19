<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Schema;
use DB;


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

    public function getEditTable(){
        Schema::table('sanpham', function($t){
            $t->dropColumn('Gia'); //xóa cột
        });
        echo 'thành công';
    }

    public function getRenameTable(){
        Schema::rename('sanpham','product');
        echo 'success';
    }

    public function getDropTable(){
        //Schema::drop('slide'); xóa bảng slide

        Schema::dropIfExists('hinhsp'); //xóa bảng slide nếu tồn tại
        echo 'success';
    }


    public function insertData(){
        DB::table('product')->insert([
            
            'TenSanPham'=>'Sản phẩm 2',
            'gia'=>'200000',
            'mota'=>'asd fgh jkl  654 33qr fgfb dfd'
        ]);
    }


    public function getProduct(){
        //$product = DB::table('products')->get(); // SELECT * FROM products
        //$product = DB::table('products')->where('id_type',5)->get(); 
                    // SELECT * FROM products WHERE id_type=5
        //$product = DB::table('products')->select('name as TenSanPham', 'unit_price as Gia')->orderBy('unit_price','DESC')->get();
                    //select name as TenSanPham, unit_price as Gia from products order by unit_price DESC
       // $product = DB::table('products')
                        //->select(DB::raw('max(unit_price) as giacaonhat'))
                        //->groupBy('id_type')
                        //->where('id_type',5)
                       // ->first(); 
                        //select count(id) as soluong
                        //from products
                        //where id_type = 5
                        //group by id

                        //SELECT max(unit_price) as giacaonhat FROM products

        //get() : trả về array data gồm nhiều object


        //first(): trả về object


        /*$product = DB::table('products')
                    ->join('type_products','type_products.id','=','products.id_type')
                    ->select('products.*','type_products.name as nameType')
                    ->where('type_products.id',1)
                    ->orWhere('type_products.id',2)
                    //->limit(10)
                    ->skip(0)->take(10)//vitri, soluong //=limit(10)
                    ->get();*/
         /*
        SELECT p.*, t.name FROM `products`  p 
        INNER JOIN type_products t ON t.id = p.id_type
        */
        $product = DB::table('products')
                    ->where('id_type',2)
                    ->avg('unit_price');
        // SELECT avg(unit_price) from products WhERE id_type=2
        dd($product);
    }


    public function getUpdateCustomer(){
        DB::table('customer')
                ->where('id',5)
                ->update(['email'=>'khoaphamtraining@gmail.com']);
        echo 'Thành công';
    }


    public function getInsertUser(){
        DB::table('users')
                ->insert([
                   'full_name'=>'Hương 2',
                   'email'=>'huong2@gmail.com' ,
                   'password'=>'1234567'
                ]);
        echo 'thành công';
    }

    public function getDeleteUser(){
        DB::table('users')->truncate();
        echo ' xóa thành công';
    }

}
