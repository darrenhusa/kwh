<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Room;

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

  // TODO Create a scope for Deluxe rooms (as a test)
}
