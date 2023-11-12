<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Top;
use App\Support\Helper;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
    $title = ['Линдавит', 'Белацеф', 'Новоинтофер', 'Монидерм', 'Аллерайз', 'Вегапенем', 'Церебрал КОГ', 'Эмерон таблетки'];
    $popular = [1, 1, 1, 1, 0, 1, 1, 0];
    $description = 'Линдавит мультивитаминный сироп, представляет собой сочетание витаминов, которые необходимы детям в процессе взросления. Сироп содержит все витамины, необходимые организму, а также те, которые ему не хватает в процессе питания.';
    $composition = '<p><b>1 мл сиропа содержит</p></b>' .
      '<ul>' .
      '<li>Витамин С (L-аскорбиновая кислота) 10 мг;</li>' .
      '<li>Никотинамид 1 мг;</li>' .
      '<li>Витамин В5 (в виде Кальция D-пантотената) 0,42 мг;</li>' .
      '<li>Витамин В1 (в виде Тиамина гидрохлорида) 0,2 мг;</li>' .
      '<li>Витамин В2 (в виде Рибофлавин-5-фосфат натрия) 0,2 мг;</li>' .
      '<li>Витамин В6 (в виде Пиридоксина гидрохлорида) 0,12 мг;</li>' .
      '<li>Витамин А (в виде Ретинил пальмитата) 54 мкг;</li>' .
      '<li>Витамин D3 (Холекальциферол) 0,5 мкг;</li>' .
      '<li>Витамин В12 (Цианокобаламин) 0,2 мкг.</li>' .
      '</ul>' .
      '<p><b>Вспомогательные вещества:</b></p>' .
      '<p>сахароза, ксантановая камедь, моногидрат лимонной кислоты, Ароматизатор Blood Orange Natural 9411/21, вода очищенная.</p>';
    $indication = 'Применяется в качестве дополнительного источника витаминов у детей, в период умственной утомляемости, при интенсивной физической активности, при нерегулярном и однообразном питании.';
    $usage = '<ul><li>Дети, в возрасте от 4 до 6 лет: 1 мл сиропа 3 раза в день (3 мл сиропа в сутки).</li><li>Дети, в возрасте от 7 до 14 лет: 1 мл сиропа 3-4 четыре раз в день (3-4 мл сиропа в сутки).</li></ul>';

    for ($i = 0; $i < count($title); $i++) {
      $p = new Product();
      $p->title = $title[$i];
      $p->slug = Helper::generateUniqueSlug($title[$i], Product::class);
      $p->prescription = rand(0, 1);
      $p->image = $p->slug . '.png';
      $p->instruction = ($i + 1) . '.pdf';
      $p->external_link = 'https://salomat.tj';
      $p->popular = $popular[$i];
      $p->description = $description;
      $p->composition = $composition;
      $p->indication = $indication;
      $p->usage = $usage;
      $p->save();

      $p->nosology()->attach(rand(1, 10));
      $p->nosology()->attach(rand(11, 22));

      $p->atx()->attach(rand(1, 10));
      $p->atx()->attach(rand(11, 27));
    }

    $top = new Top();
    $top->product_id = 1;
    $top->image = '1.png';
    $top->save();

    $top = new Top();
    $top->product_id = 2;
    $top->image = '2.png';
    $top->save();

    $top = new Top();
    $top->product_id = 3;
    $top->image = '3.png';
    $top->save();
  }
}
