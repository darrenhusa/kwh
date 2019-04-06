@extends('layout')

@section('content')
   <h1>Make Reservation</h1>

   <!-- <form action="/customers/registrations" method="post"> -->
   <!--  Test trying to feed vales to RoomsController get_available action -->
   <form action="/customers/registrations" method="post" @submit.prevent="onSubmit">

     {{ csrf_field() }}

      <div id="myForm">
        <make-reservation-component :customer="{{ $customer }}"></make-reservation-component>
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
