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

  public function calculate_bill_test()
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

  public function check_out($id)
  {
    // $customer_id = $id;

    $customer = Customer::findOrFail($id);

    $today = Carbon::today();

    // dd($customer);
    // dd($customer_id);
    // dd($today);

    // write a query to return all reservations where
    // start_date <= today <= end_date

    $current = Reservation::where('customer_no', $customer->id)
      ->where('start_date', '<=', $today)
      ->where('end_date', '>=', $today)
      ->first();

    // dd($current);
    // $start_date = $current->start_date;
    // $end_date = $current->end_date;
    // $room_no = $current->room_no;

    // $customer = $current->customer;
    // dd($start_date, $end_date, $room_no);

    $bill = $this->calculate_bill($current);

    // dd($bill);
    // $data = [
    //   'current_reservation' => $current,
    //   'bill' => $bill
    // ];

    // dd($data);

    return view('check_out', [
      'customer' => $customer,
      'current_reservation' => $current,
      'bill' => $bill
    ]);
    // return view('check_out', compact('data'));
  }

  public function calculate_bill(Reservation $current)
  {
    // $start_date, $end_date, $room_no
    // use constants as a test
    // $start_date = Carbon::create('2019', '04', '08');
    // $end_date = Carbon::create('2019', '04', '14');
    // $end_date = Carbon::create('2019', '04', '12');
    // $room_no = 200;
    // $room_no = 100;

    // convert string dates to Carbon instances
    $start_date = Carbon::createFromFormat('m/d/Y', $current->start_date);
    $end_date = Carbon::createFromFormat('m/d/Y', $current->end_date);

    // dd($sd, $ed);

    // create a query to lookup the room type
    // $category = Reservation::all()->find()->room()->category->get();

    // Lookup Room category from the Room Number
    $category = Room::where('room_no', $current->room_no)->value('category');

    //Lookup Room Rate from the Room Category
    $rate = RoomCategory::where('category', $category)->value('rate');

    // calculate the number of days for the current reservation
    $days = $end_date->diffInDays($start_date);

    // calculate the room charges for the current reservation
    $room_charges = $days * $rate;

    $current->amount = $room_charges;
    $current->save();

    // Calculate tax and total charges (optional)
    $taxes = .07 * $room_charges;
    $total_charges = $room_charges + $taxes;

    $data = [
      'start_date' => $start_date,
      'end_date' => $end_date,
      'category' => $category,
      'days' => $days,
      'rate' => $rate,
      'room_charges' => $room_charges,
      'taxes' => $taxes,
      'total_charges' => $total_charges,
    ];

    // $data = [
    //   'start_date' => $sd->toDateString(),
    //   'end_date' => $ed->toDateString(),
    //   'days' => $days,
    //   'category' => $category,
    //   'rate' => $rate,
    //   'room_charges' => $room_charges,
    // ];

    // dd($data);

    // dd($room_charges);

    // $data = [
    //   'start_date' => $start_date->toDateString(),
    //   'end_date' => $end_date->toDateString(),
    //   'days' => $days,
    //   'category' => $category,
    //   'rate' => $rate,
    //   'room_charges' => $room_charges,
    // ];

    // dd($data);
    // return $room_charges;
    return $data;

  }

}
