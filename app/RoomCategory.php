<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoomCategory extends Model
{
  protected $primaryKey = 'category';
  public $incrementing = false;
  public $timestamps = false;
}
