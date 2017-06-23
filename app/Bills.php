<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bills extends Model
{
    protected $table = 'bills';

    public function Customer(){
    	return $this->belongsTo('App\Customer','id_customer','id');
    	//id_customer: khóa ngoại
    	//id: khóa chính của bảng customers
    	//1 hóa đơn chỉ thuộc về 1 khách hàng => belongsTo()
    }


    public function Product(){
    	return $this->belongsToMany('App\Product','bill_detail','id_bill','id_product');

    	//belongsToMany('model','tên bảng trung gian','khóa ngoại của bảng đang đứng','khóa ngoại bảng liên kết tới');
    }
}
