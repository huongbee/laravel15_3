<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\TypeProduct;
use App\Customer;
use App\Bills;
use App\BillDetail;
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

    public function getDeleteProduct($id){
        $product = Product::where('id',$id)->first();
        $product->delete();
        echo 'Xóa thành công';

    }

    public function getBill($id){
        $bills = Bills::with('Customer')->where('id',$id)->first();
        echo 'Mã hóa đơn là: '.$bills->id;
        echo '. Khách hàng: '.$bills->Customer->name;
        ///dd($bills);
    }


    public function getBillOfCustomer($id){
        $customer = Customer::with('Bills')->where('id',$id)->first();
        //dd($customer);
        echo 'Khách hàng: '.$customer->name;
        $tong = 0;
        foreach($customer->Bills as $bill){
            $tong += $bill->total; //tong = tong + giá trị mới (total)
        }
        echo '. Tổng tiền: '.$tong;
    }

    public function getProductByType($id){
        $p = TypeProduct::with('Product')->where('id',$id)->first();
        dd($p);
    }

    public function getProductByBill($id_bill){
        $p = Bills::with('Product')->where('id',$id_bill)->first();
        dd($p);
    }

    public function getBillByProduct($id_product){
        $p = Product::with('Bill')->where('id',$id_product)->first();
        dd($p);
    }


    public function getBillDetailByCustomer($id_cus){
        $p = Customer::with('BillDetail')->where('id',$id_cus)->first();
        dd($p);
    }


}
