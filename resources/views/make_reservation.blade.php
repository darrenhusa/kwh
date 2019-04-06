@extends('layout')

@section('content')
   <h1>Make Reservation</h1>

   <!-- <form action="/customers/registrations" method="post"> -->
   <!--  Test trying to feed vales to RoomsController get_available action -->
   <form action="/customers/{{ $customer->id }}/reservations" method="post">
     {{--  temporary for testing --}}
     {{-- <form action="/rooms/test" method="post"> --}}

     {{ csrf_field() }}

     <label for="full_name">Book room for {{ $customer->last_name }}, {{ $customer->first_name }}</label><br/>

      <!--  Add start date control -->
      <label for="start_date">Start Date</label>
      <input type="date" name="start_date" id="start_date" value=""><br/>

      <!--  Add end date control -->
      <label for="end_date">End Date</label>
      <input type="date" name="end_date" id="end_date" value=""><br/>

      <label for="room_category">Select Room Category</label>
      <select name="room_category" id="room_category">
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
      <div id="room_select">
        <label for="rooms">Select Room</label>
        <select v-model="selected">
        {{-- <select v-model="rooms"> --}}
            <option disabled value="">Please select room</option>
            <option v-for="room in rooms" v-bind:value="room">@{{ room }}
            </option>
        </select>
        <p>Your choice is @{{ selected }}</p>

        {{-- <ul>
          <li v-for="room in rooms">@{{ room}}</li>
        </ul> --}}

      </div>

      <input type="submit" value="Save">
      <input type="reset" value="Cancel">

   </form>

   <!-- load vue and axios -->
   <script src="https://cdn.jsdelivr.net/npm/vue"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.18.0/axios.js"></script>
   {{--  temporarily in public folder --}}
   <script src="/js/load_rooms_drop_down.js"></script>

@endsection
