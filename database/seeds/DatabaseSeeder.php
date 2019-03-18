<?php

use Illuminate\Database\Seeder;
// use Database\Seeds\RoomsTableSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CustomersTableSeeder::class);
        $this->call(RoomsTableSeeder::class);
        $this->call(RoomCategoriesTableSeeder::class);
        $this->call(ReservationsTableSeeder::class);
    }
}
