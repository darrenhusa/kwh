<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class AjaxController extends Controller
{
  public function index()
  {
    // dd('message');
    $msg = "This is a simple message.";
    // dd($msg);
    // $response = response()->json(array('msg'=> $msg), 200);
    // return response()->json(array('msg'=> $msg), 200);

    $response = response()->json(['msg'=> $msg], 200);
    // $response = response()->json(['msg'=> $msg], 200);
    return $response;

  }

  public function load_data_alt()
  {
    // dd('message');
    $msg = "This is a simple message.";
    // dd($msg);
    // $response = response()->json(array('msg'=> $msg), 200);
    // return response()->json(array('msg'=> $msg), 200);

    $response = response()->json(['msg'=> $msg], 200);
    // $response = response()->json(['msg'=> $msg], 200);
    return $response;

  }


public function load_data()
{
  // placed in public folder root
  $path = "results.json";
  $content = json_decode(file_get_contents($path), true);

  return $content;
  // return response()->json([
  //     'name' => 'Laura',
  //     'age' => 35,
  //     'sex' => 'female'
  //   ]);

}

  public function get_name()
  {
    return response()->json([
        'name' => 'Laura',
        'age' => 35,
        'sex' => 'female'
      ]);

    // return [
    //   'name' => 'Laura',
    //   'age': 35,
    //   'sex': 'female'
    // ];

    // dd('inside get_namr');
    // $data = [
    //   'name' => 'Laura',
    //   'age': 35,
    //   'sex': 'female'
    // ];
    //
    // return $data;
    //
  }

}
