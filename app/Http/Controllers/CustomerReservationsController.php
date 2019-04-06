<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

use App\Customer;
use App\Reservation;
use App\RoomCategory;

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
      // TODO - Need to figure out how to pass/bind value to room!!!!
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
      // dd($input);

      // $customer = Customer::findOrFail($id);

      $data = [
        'customer_no' => $id,
        // 'customer_no' => $customer->id,
        'room_no' => 200,
        'start_date' => $request->start_date,
        'end_date' => $request->end_date,
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
      ];

      // dd($data);

      // App\Reservation::insert($data);

      $reservation = new Reservation();

      $reservation->customer_no = $id;
      $reservation->room_no = 200;
      $reservation->start_date = request('start_date');
      $reservation->end_date = request('end_date');
      $reservation->amount = 0;
      $reservation->created_at = Carbon::now();
      $reservation->updated_at = Carbon::now();

      $reservation->save();

      // dd($reservation);

      return redirect('/reservations');
  }


}
