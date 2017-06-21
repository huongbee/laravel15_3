<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Customer;
use DB;

class HomeController extends Controller
{
    public function getIndex(){
    	//$products = Product::get(); //SELECT * FROM products
    	//$products = DB::table('products')->get();
    	// $products = Product::select('type_products.name as TenLoai','products.name as TenSP','unit_price','products.image as hinhSP')
    	// 					->join('type_products','type_products.id','=','products.id_type')
    	// 					//->where('name','like','%sầu riêng%')
    	// 					->orderBy('type_products.name','ASC')
    	// 					->get();
    	$products = Product::find(['id'=>1])->first()->toArray();
    	echo '<pre>';
    	print_r($products);
    	echo '</pre>';
    }

    public function getCustomer(){
    	$customer = Customer::select('name','gender','address','phone_number')
    							->orderBy('name','ASC')
    							->get();
    	dd($customer);
    }


    public function getAddProduct(){
    	$products = new Product;
    	$products->name = "Sản phẩm mới";
    	$products->id_type = 1;
    	$products->description = "Sản phẩm mớiSản phẩm mớiSản phẩm mớiSản phẩm mới";
    	$products->unit_price = 200000;
    	$products->image = 'tenhinh.jpg';
    	$products->unit = 'hộp';
    	$products->save();
    	echo 'Thành công';
    }

    public function getEditProduct(Request $req){
    	$products = Product::find(['id'=>$req->id])->first();
    	$products->name = 'SP đã edit'; //name_san_pham lấy input có tên là name_san_pham
    	
    	$products->save();
    	echo 'Thành công';
    }
}
