<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\RoomCategory;

class RoomCategoriesController extends Controller
{
    public function get_rate(Request $request)
    {
      $category = $request->category;

      $rate = RoomCategory::select('rate')
              ->inCategory($category)
              ->get();

      dd($rate);

    }
}
