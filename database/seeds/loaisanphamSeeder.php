<?php

use Illuminate\Database\Seeder;

class loaisanphamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('loaisanpham')->insert([
    		
    		'TenSanPham'=>'Loại Sản phẩm 2',
    		'gia'=>'250000',
    		
    	]);
    }
}
