<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   *
   * @return void
   */
  public function run()
  {
    $user = new User();
    $user->name = 'Admin';
    $user->email = 'admin@mail.ru';
    $user->password = bcrypt('12345');
    $user->save();

    $this->call([
      NosologySeeder::class,
      AtxSeeder::class,
      ProductSeeder::class,
      CategorySeeder::class,
      PostSeeder::class,
      VideoSeeder::class,
    ]);
  }
}
