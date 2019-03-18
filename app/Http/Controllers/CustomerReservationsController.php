<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
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

}
