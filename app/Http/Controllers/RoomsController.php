<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Room;
use App\Reservation;

class RoomsController extends Controller
{
  public function index()
  {
      $rooms = Room::all();

      // return the deluxe rooms
      $deluxe_rooms = Room::where('Category', 'Deluxe')->get();

      dd($deluxe_rooms);
      // dd($rooms);

      return view('rooms.index', compact('rooms'));
  }

  public function get_available_rooms()
  {
    // load all reservations
    $reservations = Reservation::all();

    // dd('available_rooms');
    // dd($reservations);

    return $reservations;

  }
}
