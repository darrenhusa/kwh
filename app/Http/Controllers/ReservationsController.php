<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reservation;

class ReservationsController extends Controller
{
  public function index()
  {
      $reservations = Reservation::all();

      // return the available rooms?
      // return the deluxe rooms (use a RoomsController instead???)

      // $reservations = Reservation::all()->where();

      return view('reservations.index', compact('reservations'));
  }

  // public function get_available_rooms()
  // {
  //     $reservations = Reservation::all()->where('start_date', '>=', date )->get();
  //
  //     // select the room no field only???
  //
  //     return $reservations
  //     // return the available rooms?
  //
  //     // $reservations = Reservation::all()->where();
  //
  //     // return view('reservations.index', compact('reservations'));
  // }
  //
  
}
