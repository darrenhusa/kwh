<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

use App\Customer;
use App\Reservation;
use App\RoomCategory;
use App\Room;

class CustomerReservationsController extends Controller
{
  public function create($id)
  {
      $customer = Customer::findOrFail($id);

      $room_categories = RoomCategory::all();
      // $room_categories = RoomCategory::lists('', '');

      $data = [
        'customer' => $customer,
        'room_categories' => $room_categories,
      ];

      // dd($id);
      return view('make_reservation', $data);
  }

  public function store(Request $request, $id)
  {
      // $input = [
      //   // 'customer' => $id,
      //   // 'customer' => $customer->id,
      //   // 'customer_no' => $request->,
      //   'start_date' => $request->start_date,
      //   'end_date' => $request->end_date,
      //   'category' => $request->room_category,
      //   // 'room' => $request->room.selected
      //   // 'room' => $request->room.selected
      // ];

      // dd($id);
      // dd($request);
      // dd($request->all());
      // dd($input);

      // $customer = Customer::findOrFail($id);

      // $data = [
      //   'customer_no' => $id,
      //   // 'customer_no' => $customer->id,
      //   'room_no' => $request->selected,
      //   'start_date' => $request->start_date,
      //   'end_date' => $request->end_date,
      //   'created_at' => Carbon::now(),
      //   'updated_at' => Carbon::now(),
      // ];

      // dd($data);

      // App\Reservation::insert($data);

      $reservation = new Reservation();

      $reservation->customer_no = $id;
      $reservation->room_no = request('selected_room');
      $reservation->start_date = request('start_date');
      $reservation->end_date = request('end_date');
      $reservation->amount = 0;
      $reservation->created_at = Carbon::now();
      $reservation->updated_at = Carbon::now();

      $reservation->save();

      // \Log::info('request');
      \Log::info($request);

      // \Log::info('reservation');
      \Log::info($reservation);

      // dd($reservation);

      return redirect('/reservations');
  }

  public function calculate_bill()
  {
    // use constants as a test
    $start_date = Carbon::create('2019', '04', '08');
    $end_date = Carbon::create('2019', '04', '14');
    // $end_date = Carbon::create('2019', '04', '12');
    // $room_no = 200;
    $room_no = 100;

    // create a query to lookup the room type
    // $category = Reservation::all()->find()->room()->category->get();
    $category = Room::where('room_no', $room_no)->value('category');
    $rate = RoomCategory::where('category', $category)->value('rate');

    $days = $end_date->diffInDays($start_date);

    $room_charges = $days * $rate;

    $data = [
      'start_date' => $start_date->toDateString(),
      'end_date' => $end_date->toDateString(),
      'days' => $days,
      'category' => $category,
      'rate' => $rate,
      'room_charges' => $room_charges,
    ];

    dd($data);

  }


}
