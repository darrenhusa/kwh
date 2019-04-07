@extends('layout')

@section('content')
   <h1>Make Reservation</h1>

   <!-- <form action="/customers/registrations" method="post"> -->
   <!--  Test trying to feed vales to RoomsController get_available action -->
   {{-- <form> --}}
   <form action="/customers/registrations" method="post">

     {{ csrf_field() }}

      <div id="myForm">
        <make-reservation-component :customer="{{ $customer }}"></make-reservation-component>
      </div>

   </form>

   <!-- load vue and axios -->
   <script src="https://cdn.jsdelivr.net/npm/vue"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.18.0/axios.js"></script>
   {{--  temporarily in public folder --}}
   <script src="/js/app.js"></script>
   <script>

     new Vue({

       el: '#myForm',

     })

   </script>
   {{-- <script src="/js/load_rooms_drop_down.js"></script> --}}

@endsection
