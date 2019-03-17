<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class RoomsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rooms')->insert([
          'room_no' => 100,
          'category' => 'Economy',
          'unavailable' => false,
          'needs_cleaning' => false,
        ]);
        DB::table('rooms')->insert([
          'room_no' => 101,
          'category' => 'Economy',
          'unavailable' => false,
          'needs_cleaning' => false,
        ]);
        DB::table('rooms')->insert([
          'room_no' => 102,
          'category' => 'Economy',
          'unavailable' => false,
          'needs_cleaning' => false,
        ]);
        DB::table('rooms')->insert([
          'room_no' => 103,
          'category' => 'Economy',
          'unavailable' => false,
          'needs_cleaning' => false,
        ]);
        DB::table('rooms')->insert([
          'room_no' => 103,
          'category' => 'Economy',
          'unavailable' => false,
          'needs_cleaning' => false,
        ]);
        DB::table('rooms')->insert([
          'room_no' => 104,
          'category' => 'Economy',
          'unavailable' => false,
          'needs_cleaning' => true,
        ]);
        DB::table('rooms')->insert([
          'room_no' => 200,
          'category' => 'Deluxe',
          'unavailable' => false,
          'needs_cleaning' => false,
        ]);
        DB::table('rooms')->insert([
          'room_no' => 201,
          'category' => 'Deluxe',
          'unavailable' => true,
          'needs_cleaning' => true,
        ]);
    }
}
