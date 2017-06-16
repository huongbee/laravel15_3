<?php

use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product')->insert([

    		'TenSanPham'=>'Sản phẩm 4',
    		'gia'=>'200000',
    		'mota'=>'asd fgh jkl  654 33qr fgfb dfd'
    	]);
    }
}
