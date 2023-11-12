<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Support\Helper;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $title = ['Здоровый образ жизни', 'Биология', 'Микробиология', 'Зоология', 'Красота', 'Нанотехнологии'];
      $image = ['1.png', '2.png', '3.png', '4.png', '5.png', '6.png'];
      $scientific = [true, true, true, true, true, true];
      $interesting = [true, false, true, false, true, true];

      for($i = 0; $i < count($title); $i++) {
        $cat = new Category();
        $cat->title = $title[$i];
        $cat->slug = Helper::generateUniqueSlug($cat->title, Category::class);
        $cat->image = $image[$i];
        $cat->scientific = $scientific[$i];
        $cat->interesting = $interesting[$i];
        $cat->save();
      }
    }
}
