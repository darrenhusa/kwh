@extends('layout')

@section('content')
   <h1>Make Reservation</h1>

   <form action="/customers/registrations" method="post">

     {{ csrf_field() }}

     <label for="full_name">Book room for {{ $customer->last_name }}, {{ $customer->first_name }}</label><br/>

      <!--  Add start date control -->
      <label for="start_date">Start Date</label>
      <input type="date" name="start_date" id="start_date" value=""><br/>

      <!--  Add end date control -->
      <label for="end_date">End Date</label>
      <input type="date" name="end_date" id="end_date" value=""><br/>

      <label for="room_categories">Select Room Category</label>
      <select name="room_categories">
         @foreach($room_categories as $room_category)
           <option value="{{$room_category->category}}">{{$room_category->category}}</option>
           @endforeach
      </select><br/>

      <!--  Add room category select control -->
      <!--  hardcode it? or how do you programmatically populate a select in php/laravel-->
      <!-- <label for="room_categories">Select Room Category</label>
      <select name="room_categories">
          <option value="economy">Economy</option>
          <option value="deluxe">Deluxe</option>
          <option value="suite">Suite</option>
      </select><br/> -->

      <!--  Add room select control -->
      <!--  need to programmatically populate this control! -->

      <input type="submit" value="Save">
      <input type="reset" value="Cancel">

   </form>

@endsection
