<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = "products";

    public function TypeProduct(){
    	return $this->belongsTo('App\TypeProduct','id_type','id');
    }


    public function Bill(){
    	return $this->belongsToMany('App\Bills','bill_detail','id_product','id_bill');

    	//belongsToMany('model','tên bảng trung gian','khóa ngoại của bảng đang đứng','khóa ngoại bảng liên kết tới');
    }
}
