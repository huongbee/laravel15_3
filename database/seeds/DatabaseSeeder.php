<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ProductSeeder::class);
        $this->call(loaisanphamSeeder::class);

        
    	/*DB::table('product')->insert([

    		'TenSanPham'=>'Sản phẩm 1',
    		'gia'=>'200000',
    		'mota'=>'asd fgh jkl  654 33qr fgfb dfd'
    	]);

    	DB::table('loaisanpham')->insert([
    		
    		'TenSanPham'=>'Sản phẩm 1',
    		'gia'=>'200000',
    		'mota'=>'asd fgh jkl  654 33qr fgfb dfd'
    	]);*/
    }
}
