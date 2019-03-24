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

  public function get_available_rooms(Request $request)
  {
    // Define constants for testing
    // $format = 'Y-m-d';
    // $start_date = DateTime::createFromFormat($format, '2019-03-17');
    // $end_date = DateTime::createFromFormat($format, '2019-03-18');
    // $category = 'Economy';
    // $category = 'Deluxe';

    // dd($request->start_date);
    // dd($request);

    $input = [
      'start_date' => $request->start_date,
      'end_date' => $request->end_date,
      'category' => $request->room_category
    ];

    // dd($input_data);

    // $qry_reserved_rooms1 = Reservation::ReservedDuringRequestedReservation($input['start_date'], $input['end_date'])
    //   ->select('room_no', 'start_date', 'end_date');

    // dd($qry_reserved_rooms1->toSql());
    // dd($qry_reserved_rooms1->get());

    // $qry_reserved_rooms2 = DB::table('rooms')
    //     ->leftJoin('qry_reserved_rooms1', 'rooms.room_no', '=', 'qry_reserved_rooms1.room_no')
    //     ->where('category', $input['category'])
    //     ->select('qry_reserved_rooms1.room_no', 'start_date', 'end_date',
    //              'rooms.room_no', 'category', 'unavailable');
    //
    //   // dd($qry_reserved_rooms2->toSql());
      // dd($qry_reserved_rooms2->get());

      // $qry = DB::table('rooms')
      //     ->select('reservations.room_no as reservationsRoom', 'start_date', 'end_date',
      //          'rooms.room_no as roomsRoom', 'category', 'unavailable')
      //     ->leftJoin('reservations', 'rooms.room_no', '=', 'reservations.room_no')
      //     ->where('category', $input['category']);
      //

      $qry = Room::select('reservations.room_no as reservationsRoom', 'start_date', 'end_date',
               'rooms.room_no as roomsRoom', 'category', 'unavailable')
          ->leftJoin('reservations', 'rooms.room_no', '=', 'reservations.room_no')
          ->inCategory($input['category']);

      $available_rooms = $qry->whereNull('reservationsRoom');
      dd($available_rooms);

      // $available_rooms = collect($qry->toArray());
      // $qry2 = $available_rooms->filter(function ($qry) { return $qry['reservationsRoom'] == null; });

      // $qry2 = $qry->select('reservations.room_no as reservationsRoom', 'start_date', 'end_date',
      //                      'rooms.room_no as roomsRoom', 'category', 'unavailable')
      //             ->whereNull('reservationsRoom');

      dd($qry2->get());

    // return $available;

  }
}
