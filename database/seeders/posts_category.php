<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class posts_category extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('posts_category')->insert([
            ['id'=>1,'name'=>'Thể Thao'],
            ['id'=>2,'name'=>'Sức Khỏe'],
            ['id'=>3,'name'=>'Văn Hóa'],
            ['id'=>4,'name'=>'Giải trí'],
            ['id'=>5,'name'=>'Giáo dục'],
            ['id'=>6,'name'=>'Thế giới'],
        ]);
    }
}
