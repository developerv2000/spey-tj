<?php

namespace Database\Seeders;

use App\Models\Video;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VideoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $title = ['Пардифен - от боли и жара', 'Covid 19', 'Лесон в комплексном лечении больных аллергодерматозами', 'Красота'];

      for($i = 0; $i < count($title); $i++) {
        $vid = new Video();
        $vid->title = $title[$i];
        $vid->filename = ($i + 1) . '.mp4';
        $vid->save();
      }
    }
}
