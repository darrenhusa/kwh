<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoomCategory extends Model
{
  protected $primaryKey = 'category';
  protected $keyType = 'string';

  public $incrementing = false;
  public $timestamps = false;

  public function scopeInCategory($query, $category)
  {
      return $query->where('category', $category);
  }

}
