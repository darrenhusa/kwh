<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $primaryKey = 'room_no';
    public $incrementing = false;
    public $timestamps = false;

    // Examples:
    // $deluxe_rooms = App\Room::InCategory('Deluxe')->get();
    // $economy_rooms = App\Room::InCategory('Economy')->get();
    public function scopeInCategory($query, $category)
    {
        return $query->where('category', $category);
    }

}
