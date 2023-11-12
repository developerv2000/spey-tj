<?php

namespace Database\Seeders;

use App\Models\Nosology;
use App\Support\Helper;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NosologySeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $title = ['Алгология', 'Аллергология', 'Антипсихотические средства', 'Вирусология', 'Гастроэнтерология', 'Гематология', 'Гинекология', 'Дерматология', 'Иммунология', 'Кардиология', 'Неврология', 'Ортопедия', 'Отоларингология', 'Паразитология', 'Педиатрия', 'Проктология', 'Пульмонология', 'Ревматология', 'Сердечно - сосудистые заболевания', 'Стоматология', 'Урология', 'Эндокринология'];

    for($i = 0; $i < count($title); $i++) {
      $nos = new Nosology();
      $nos->title = $title[$i];
      $nos->slug = Helper::generateUniqueSlug($nos->title, Nosology::class);
      $nos->save();
    }
  }
}
