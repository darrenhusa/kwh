<?php

use Illuminate\Database\Seeder;

class RoomCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('room_categories')->insert([
        'category' => 'Economy',
        'description' => 'Lorem ipsum',
        'rate' => 100.00,
      ]);
      DB::table('room_categories')->insert([
        'category' => 'Deluxe',
        'description' => 'Lorem ipsum',
        'rate' => 150.00,
      ]);
      DB::table('room_categories')->insert([
        'category' => 'Suite',
        'description' => 'Lorem ipsum',
        'rate' => 250.00,
      ]);
    }
}
