<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class posts extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('posts')->insert([
           ['id'=>1,'posts_category_id'=>1,'title'=>'Choáng với số tiền khổng lồ Ronaldinho nhận được ở Indonesia','introText'=>'CLB mới lên hạng ở giải vô địch quốc gia Indonesia, Rans Cilegon FC được cho là chi khá mạnh tay để sở hữu Ronaldinho trong vòng… 1 tuần.','description'=>'Như đã biết, mới đây, Ronaldinho đã đồng ý tới CLB Rans Cilegon thi đấu trong vòng 1 tuần. Trong đó, cầu thủ này sẽ tham gia hai trận đấu giao hữu với các CLB khác của Indonesia là CLB Arema và Persija Jakarta.','images'=>'abc.jpg','author'=>'thinhdq'],
           ['id'=>2,'posts_category_id'=>3,'title'=>'Môi trường văn hóa là gốc của việc chấn hưng và phát triển văn hóa','introText'=>'Đó là phát biểu của Bộ trưởng Bộ VH,TT&DL tại lễ phát động, triển khai công tác năm 2022 với chủ đề: "Xây dựng môi trường văn hóa cơ sở và công tác tổ chức cán bộ".','description'=>'Sáng 14/3, tại Khu di tích Quốc gia đặc biệt Kim Liên, xã Kim Liên, huyện Nam Đàn - Bộ Văn hóa, Thể thao và Du lịch (VH,TT&DL), UBND tỉnh Nghệ An tổ chức lễ phát động, triển khai chủ đề công tác năm 2022.','images'=>'fileanh.jpg','author'=>'thinhdq'],
        ]);
    }
}
