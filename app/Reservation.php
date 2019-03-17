<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
  protected $primaryKey = 'reservation_no';

  public function customer()
  {
      return $this->belongsTo(Customer::class);
  }
}
