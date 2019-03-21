<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ReservationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $tz = 'America/Chicago';
      $format = 'Y-m-d';
      // $start_date = DateTime::createFromFormat($format, '2009-03-17');
      // Carbon::createFromDate(20119, 3, 17, tz)

      DB::table('reservations')->insert([
        'room_no' => 100,
        'start_date' => DateTime::createFromFormat($format, '2019-03-17'),
        'end_date' => DateTime::createFromFormat($format, '2019-03-18'),
        'amount' => 0.0,
        'customer_no' => 1,
        'created_at' => DateTime::createFromFormat($format, '2019-03-17'),
        'updated_at' => DateTime::createFromFormat($format, '2019-03-17'),
      ]);

      DB::table('reservations')->insert([
        'room_no' => 101,
        'start_date' => Carbon::createFromDate(2019, 3, 17, $tz),
        'end_date' => Carbon::createFromDate(2019, 3, 27, $tz),
        'amount' => 0.0,
        'customer_no' => 2,
        'created_at' => DateTime::createFromFormat($format, '2019-03-17'),
        'updated_at' => DateTime::createFromFormat($format, '2019-03-17'),
      ]);
    }
}
