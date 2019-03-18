<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Room;

class RoomsController extends Controller
{
  public function index()
  {
      $rooms = Room::all();

      // return the deluxe rooms (use a RoomsController instead???)
      // $deluxe_rooms = Reservation::all()->where();

      return view('rooms.index', compact('rooms'));
  }
}
