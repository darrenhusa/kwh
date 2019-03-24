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

    // $qry_reserved_rooms1 = DB::table('reservations')
    //     ->where([
    //       ['start_date', '<=', $input['start_date']],
    //       ['end_date', '>=', $input['end_date']],
    //     ])
    //     ->OrWhere([
    //       ['start_date', '>=', $input['start_date']],
    //       ['start_date', '<=', $input['end_date']],
    //       ['end_date', '>=', $input['end_date']],
    //     ])
    //     ->OrWhere([
    //       ['start_date', '<=', $input['start_date']],
    //       ['end_date', '>=', $input['start_date']],
    //       ['end_date', '<=', $input['end_date']],
    //     ])
    //     ->select('room_no', 'start_date', 'end_date');
    //     // ->get();

        $qry_reserved_rooms1 = DB::table('reservations as rr1')
            ->where([
              ['start_date', '<=', $input['start_date']],
              ['end_date', '>=', $input['end_date']],
            ])
            ->OrWhere([
              ['start_date', '>=', $input['start_date']],
              ['start_date', '<=', $input['end_date']],
              ['end_date', '>=', $input['end_date']],
            ])
            ->OrWhere([
              ['start_date', '<=', $input['start_date']],
              ['end_date', '>=', $input['start_date']],
              ['end_date', '<=', $input['end_date']],
            ])
            ->select('room_no', 'start_date', 'end_date');

        // dd($qry_reserved_rooms1->toSql());
        // dd($qry_reserved_rooms1->get());

      // $qry_rr1 = DB::raw('(' . $qry_reserved_rooms1->toSql() . ')');

      //test example!!!!
      // tested on 3/22/2019
      //works with reservations as a table in the join
      // $qry_reserved_rooms2 = DB::table('rooms')
      //   ->leftJoin('reservations', 'rooms.room_no', '=', 'reservations.room_no')
      //   ->select('reservations.room_no', 'start_date', 'end_date',
      //            'rooms.room_no', 'category', 'unavailable')
      //   ->get();

      $qry_reserved_rooms2 = DB::table('rooms')
        ->leftJoin(function($query) {
          $query, 'rooms.room_no', '=', $query.room_no
        })
        // ->where('qry_reserved_rooms1.room_no', null)
        ->where('category', $input['category'])
         // ->where($input, function ($query) {
         //        $query->where([
         //          ['start_date', '<=', $input['start_date']],
         //          ['end_date', '>=', $input['end_date']],
         //        ])
         //        ->OrWhere([
         //          ['start_date', '>=', $input['start_date']],
         //          ['start_date', '<=', $input['end_date']],
         //          ['end_date', '>=', $input['end_date']],
         //        ])
         //        ->OrWhere([
         //          ['start_date', '<=', $input['start_date']],
         //          ['end_date', '>=', $input['start_date']],
         //          ['end_date', '<=', $input['end_date']],
         //        ]);
         //      })
          ->select('rr1.room_no', 'start_date', 'end_date',
                   'rooms.room_no', 'category', 'unavailable');

        // dd($qry_reserved_rooms2->toSql());
        dd($qry_reserved_rooms2->get());
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
