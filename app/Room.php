<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $primaryKey = 'room_no';
    public $incrementing = false;
    public $timestamps = false;

    // public function scopeAvailable($query)
    // {
    //     $format = 'Y-m-d'
    //     $start_date = DateTime::createFromFormat($format, '2019-03-17');
    //     $end_date = DateTime::createFromFormat($format, '2019-03-18');
    //     $category = 'Economy';
    //
    //     // load all Reservations
    //     // $all_reservations = App\Reservation::all();
    //
    //     // limit to the rooms by category
    //     $reservations = App\Reservation::where('category', $category);
    //     dd($reservations);
    //
    //     // limit to the rooms by date
    //     $available = $reservations->where([
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
    //     ]);
    //
    //     dd($available);
    //
    //     return $available;
    // }

    public function scopeDeluxe($query)
    {
        return $query->where('category', 'Deluxe');
    }

    public function scopeEconomy($query)
    {
        return $query->where('category', 'Economy');
    }

}
