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
      // $deluxe_rooms = Room::where('Category', 'Deluxe')->get();

      // dd($deluxe_rooms);
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
    // dd($request->all());

    // FOR TESTING!!!!!
    // $input = [
    //   'start_date' => $start_date,
    //   'end_date' => $end_date,
    //   'category' => $category
    // ];

    $input = [
      'start_date' => $request->start_date,
      'end_date' => $request->end_date,
      'category' => $request->room_category
    ];

    // $input = [
    //   'start_date' => $request->input('start_date'),
    //   'end_date' => $request->input('end_date'),
    //   'category' => $request->input('room_category')
    // ];

    // dd($input);

    \Log::info($input);

    // $qry_reserved_rooms1 = Reservation::all()
    //     ->roomsAlreadyReserved($input['start_date'], $input['end_date']);
    //     // ->select('room_no', 'start_date', 'end_date')
        // ->get();

    $qry_reserved_rooms1 = Reservation::select('room_no', 'start_date', 'end_date')
            ->roomsAlreadyReserved($input['start_date'], $input['end_date']);
            // ->get();

    // dd($qry_reserved_rooms1->toSql());
    // dd($qry_reserved_rooms1);

    // $qry_reserved_rooms2 = DB::table('rooms')
    //     ->leftJoin('qry_reserved_rooms1', 'rooms.room_no', '=', 'qry_reserved_rooms1.room_no')
    //     ->where('category', $input['category'])
    //     ->select('qry_reserved_rooms1.room_no', 'start_date', 'end_date',
    //          'rooms.room_no', 'category', 'unavailable');

     $qry = DB::table('rooms')
        ->leftJoinSub($qry_reserved_rooms1, 'qry_reserved_rooms1', function ($join) {
                 $join->on('rooms.room_no', '=', 'qry_reserved_rooms1.room_no');
         })
         ->whereNull('qry_reserved_rooms1.room_no')
         ->where('category', $input['category'])
         ->select('qry_reserved_rooms1.room_no', 'start_date', 'end_date',
              'rooms.room_no', 'category', 'unavailable');

      // dd($qry->get());
      // dd($qry->get()->pluck('room_no'));
      // dd($qry->get()->value('room_no'));

      // dd($qry->get()->pluck('room_no')->toArray());

      $available_rooms = $qry->get()->pluck('room_no')->toArray();

      // dd($available_rooms);

      // $available_rooms = $qry->get()->pluck('roomsRoom');

      // \Log::info($available_rooms);

      return $available_rooms;
      // return $available_rooms->toArray();
      // return response()->json($available_rooms);
  }

  public function test_available_rooms()
  {
    return [102, 103, 104, 105, 200, 201, 300];
  }

}
