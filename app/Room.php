<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $primaryKey = 'room_no';
    public $incrementing = false;
    public $timestamps = false;

    public function scopeAvailable($query)
    {
        $format = 'Y-m-d'
        $start_date = DateTime::createFromFormat($format, '2019-03-17');
        $end_date = DateTime::createFromFormat($format, '2019-03-17');
        $category = 'Economy';

        // load all Reservations
        $reservations = App\Reservation::all();
        dd($reservations);

        $available = $query->where('start_date', '<=', $start_date);

        return $available;
    }

    public function scopeDeluxe($query)
    {
        return $query->where('category', 'Deluxe');
    }

    public function scopeEconomy($query)
    {
        return $query->where('category', 'Economy');
    }

}
