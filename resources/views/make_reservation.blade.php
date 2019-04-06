@extends('layout')

@section('content')
   <h1>Make Reservation</h1>

   <!-- <form action="/customers/registrations" method="post"> -->
   <!--  Test trying to feed vales to RoomsController get_available action -->
   <form action="/rooms/test" method="post">

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
        <select>
        {{-- <select v-model="rooms"> --}}
            <option disabled value="">Please select room</option>
            <option v-for="room in rooms" :value="room">@{{ room }}
            </option>
        </select>

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
   <script>

     new Vue({
       el: '#room_select',
       data: {
         rooms: []
       },

       mounted() {
         // Make an ajax request and render the response
         // alert('alert');
         // axios.get('/available_rooms').then(response => console.log(response.data));
         // test
         // axios.get('/available_rooms').then(response => this.rooms = response.data);

         axios.get('/rooms/get_available').then(response => this.rooms = response.data);

       }
     })

   </script>

@endsection
