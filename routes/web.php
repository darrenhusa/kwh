<?php


Route::get('/', function () {
    return view('welcome');
});

// Route::get('/customers', 'CustomerController@index');
// Route::get('/customers/new', 'CustomerController@create');

// KWH Routes

// Route::get('/', 'CustomersController@index');
// Route::get('/', 'CustomersController@index');

Route::get('/customers/{customer}/reservations/create', 'CustomerReservationsController@create');
Route::post('/customers/{customer}/reservations', 'CustomerReservationsController@store');

Route::resource('customers', 'CustomersController');

Route::get('/reservations','ReservationsController@index');

Route::get('/rooms','RoomsController@index');

Route::get('/rooms/get_available','RoomsController@get_available_rooms');
Route::get('/rooms/test','RoomsController@get_available_rooms');
// Route::post('/rooms/test','RoomsController@get_available_rooms');

Route::get('/get_room_rate','RoomCategoriesController@get_rate');
Route::get('/get_rate','RoomCategoriesController@get_rate');

Route::get('/get_room_availability','RoomsController@get_availability');

Route::get('/get_bill', 'CustomerReservationsController@calculate_bill');

Route::get('/customers/{customer}/check_out', 'CustomerReservationsController@check_out');


// Route::get('/load_categories','RoomCategoriesController@get_room_categories');

//test vue
// Route::get('/test_vue', function(){
//   return view('vue');
// });

//test ajax with vue
Route::get('/available_rooms', function(){
  // fake the available rooms
  return [102, 103, 104, 105, 200, 201, 300];
});

// Route::get('/available_rooms','RoomsController@test_available_rooms');





// this is the jquery-ajax example!!
// tested successfully on 3/16/2019
Route::get('/ajax_test',function() {
   return view('message');
});

Route::post('/getmsg','AjaxController@index');

// loads json in the web page - returned from the route as a closure
Route::get('/ajax2',function() {
   return response()->json([
       'name' => 'Laura',
       'age' => 35,
       'sex' => 'female'
     ]);
});

// Route::get('/ajax',function() {
//    return view('ajax');
// });

// this is the code where was attempting to use a remote API
// and getJSON and jquery ajax to retrieve data and write to the web page
Route::get('/congress',function() {
   return view('congress');
});

// loads json in the web page - returned from our controller
Route::get('/get_name','AjaxController@get_name');

// both of these work
// loads json in the web page - returned from our controller
Route::get('/load_data','AjaxController@load_data_alt');
// Route::get('/load_data','AjaxController@load_data');
