<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $primaryKey = 'room_no';
    public $incrementing = false;
    public $timestamps = false;

}
