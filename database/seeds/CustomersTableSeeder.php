<?php

use Illuminate\Database\Seeder;

class CustomersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('customers')->insert([
        // 'id' => 100,
        'first_name' => 'Darren',
        'last_name' => 'Henderson',
      ]);

      DB::table('customers')->insert([
        // 'id' => 110,
        'first_name' => 'Richard',
        'last_name' => 'Dawson',
      ]);

      DB::table('customers')->insert([
        // 'id' => 120,
        'first_name' => 'George',
        'last_name' => 'Foreman',
      ]);

      DB::table('customers')->insert([
        // 'id' => 125,
        'first_name' => 'Jennifer',
        'last_name' => 'Lopez',
      ]);

      DB::table('customers')->insert([
        // 'id' => 130,
        'first_name' => 'Matt',
        'last_name' => 'Nagy',
      ]);

      DB::table('customers')->insert([
        // 'id' => 140,
        'first_name' => 'Mitch',
        'last_name' => 'Trubinsky',
      ]);

    }
}
