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
        // 'id' => 1,
        'first_name' => 'Darren',
        'last_name' => 'Henderson',
      ]);

      DB::table('customers')->insert([
        // 'id' => 2,
        'first_name' => 'LeBron',
        'last_name' => 'James',
      ]);

      DB::table('customers')->insert([
        // 'id' => 4,
        'first_name' => 'Otto',
        'last_name' => 'Porter',
      ]);

      // DB::table('customers')->insert([
      //   // 'id' => 4,
      //   'first_name' => 'Otto',
      //   'last_name' => 'Porter',
      // ]);

    }
}
