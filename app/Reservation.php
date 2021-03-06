<?php

namespace App;
use Carbon\Carbon;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
  protected $primaryKey = 'reservation_no';

  public function customer()
  {
      return $this->belongsTo(Customer::class);
  }

  public function room()
  {
      return $this->belongsTo(Room::class);
  }
  // define accessors for start date and end date
  // to return dates without a time component and formatted as m/d/Y
    public function getStartDateAttribute($value)
    {
      return Carbon::parse($value)->format('m/d/Y');

    }

    public function getEndDateAttribute($value)
    {
      return Carbon::parse($value)->format('m/d/Y');

    }

    public function scopeRoomsAlreadyReserved($query, $start_date, $end_date)
    {
        return $query->where([
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
        ]);

    }

    public function getAmountAttribute($value)
    {
        return number_format($value, 2);
    }

}
