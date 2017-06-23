<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customer';


    public function Bills(){
    	return $this->hasMany('App\Bills','id_customer','id');
    	//id_customer: khóa ngoại
    	//id: khóa chính của bảng customers
    	//1 khách hàng có nhiều hóa đơn => dùng hasMany()
    }


    public function BillDetail(){
    	return $this->hasManyThrough('App\BillDetail','App\Bills','id_customer','id_bill','id');

    	//hasManyThrough('model liên kết tới','Model của bảng trung gian','khóa ngoại bảng trung gian','khóa ngoại bảng liên kết tới','khóa chính model hiện tại');
    }
}
