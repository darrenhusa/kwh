<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\RoomCategory;

class RoomCategoriesController extends Controller
{
    public function get_rate(Request $request)
    {
      $category = $request->room_category;

      // $category = 'Deluxe';
      // $category = 'Suite';
      // $category = 'Economy';

      $rate = RoomCategory::inCategory($category)
              ->value('rate');

      // dd($rate);
      return $rate;
    }
}
