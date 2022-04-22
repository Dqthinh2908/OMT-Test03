<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use function bcrypt;

class users extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            ['id'=>1,'name'=>'thanhthanh','email'=>'thanhthanh@omt.com.vn','password'=>bcrypt('123456'),'level'=>2],
            ['id'=>2,'name'=>'thinhdq','email'=>'admin@omt.com.vn','password'=>bcrypt('123456'),'level'=>1],
            ['id'=>3,'name'=>'haunt','email'=>'haunt@omt.com.vn','password'=>bcrypt('123456'),'level'=>1],
        ]);
    }
}
