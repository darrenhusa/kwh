<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use \DateTime;
use \DB;

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
    // Define constants for testing
    $format = 'Y-m-d';
    $start_date = DateTime::createFromFormat($format, '2019-03-17');
    $end_date = DateTime::createFromFormat($format, '2019-03-18');
    $category = 'Economy';
    // $category = 'Deluxe';

    $qry_reserved_rooms1 = DB::table('reservations')
        ->where([
          ['start_date', '<=', $start_date],
          ['end_date', '>=', $end_date],
        ])
        ->OrWhere([
          ['start_date', '>=', $start_date],
          ['start_date', '<=', $end_date],
          ['end_date', '>=', $end_date],
        ])
        ->OrWhere([
          ['start_date', '<=', $start_date],
          ['end_date', '>=', $start_date],
          ['end_date', '<=', $end_date],
        ])
        ->select('room_no', 'start_date', 'end_date')
        ->get();

        // $qry_reserved_rooms1 = DB::table('reservations')
        // ->select('room_no', 'start_date', 'end_date')
        // ->get();
        //
        //   $qry_reserved_rooms1->where([
        //       ['start_date', '<=', $start_date],
        //       ['end_date', '>=', $end_date],
        //     ])
        //     ->OrWhere([
        //       ['start_date', '>=', $start_date],
        //       ['start_date', '<=', $end_date],
        //       ['end_date', '>=', $end_date],
        //     ])
        //     ->OrWhere([
        //       ['start_date', '<=', $start_date],
        //       ['end_date', '>=', $start_date],
        //       ['end_date', '<=', $end_date],
        //     ])
        //     ->get();

      // dd($qry_reserved_rooms1);

      // Need to join qry_reserved_rooms1 and rooms table
      // with an outer join which includes all the rows from rooms
      // $qry_reserved_rooms2 = DB::table('rooms')
      //   ->select('rooms.room_no', 'category', 'unavailable')

      $qry_reserved_rooms2 = DB::table('rooms')
        ->leftJoin($qry_reserved_rooms1, 'rooms.room_no', '=', 'reservations.room_no')
        ->select('reservations.room_no', 'start_date', 'end_date',
                 'rooms.room_no', 'category', 'unavailable')
        ->get();
        // ->pluck('room_no');

        dd($qry_reserved_rooms2);
    // dd($category);
    // dd($start_date);
    // dd($end_date);

    // load all reservations
    // $reservations = Reservation::all();
    // $first_reservation = Reservation::get()->first();
    // $reservations = Reservation::where();

    // limit to the rooms by category
    $rooms = Room::where('category', $category)->get();
    dd($rooms);
    // dd($reservations);
    // dd($first_reservation);

    // limit to the rooms by date?
    $available = Reservation::where([
      ['start_date', '<=', $start_date],
      ['end_date', '>=', $end_date],
    ])
    ->OrWhere([
      ['start_date', '>=', $start_date],
      ['start_date', '<=', $end_date],
      ['end_date', '>=', $end_date],
    ])
    ->OrWhere([
      ['start_date', '<=', $start_date],
      ['end_date', '>=', $start_date],
      ['end_date', '<=', $end_date],
    ])
    ->get();

    dd($available);

    return $available;

    // dd('available_rooms');
    // dd($reservations);

    // return $reservations;
  }
}
