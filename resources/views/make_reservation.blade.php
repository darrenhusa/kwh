@extends('layout')

@section('content')
   <h1>Make Reservation</h1>

   <!-- <form action="/customers/registrations" method="post"> -->
   <!--  Test trying to feed vales to RoomsController get_available action -->
   {{-- <form> --}}
   {{-- <form action="/registrations" method="get"> --}}
   <form action="/customers/{{ $customer->id }}/reservations" method="post">

     {{ csrf_field() }}

      <div id="myForm">
        <make-reservation-component :customer="{{ $customer }}"></make-reservation-component>

        <input type="submit" value="Save">
        <input type="reset" value="Cancel">

      </div>

   </form>

   <!-- load vue and axios -->
   <script src="https://cdn.jsdelivr.net/npm/vue"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.18.0/axios.js"></script>
   {{--  temporarily in public folder --}}
   <script src="/js/app.js"></script>
   <script>

    window.csrf_token = "{{ csrf_token() }}"

     new Vue({

       el: '#myForm',

       // methods: {
       //
       //   saveReservation: function() {
       //
       //     const now = new Date();
       //
       //     console.log('inside saveReservation');
       //
       //     var data = {
       //       'start_date': this.start_date,
       //       'end_date': this.end_date,
       //       'room_category': this.room_category,
       //       'room_no': this.selected_room,
       //       'amount': 0,
       //       'customer_no': this.customer.id,
       //       'created_at': now,
       //       'updated_at': now,
       //     };
       //
       //     console.log(data);
       //
       //     var url = '/customers/' + data.customer_no +'/reservations';
       //
       //     //console.log('url = ' + url);
       //
       //     console.log('calling axios to save reservation');
       //
       //     axios.post(url, data)
       //         .then(function (response) {
       //             console.log(response);
       //           })
       //           .catch(function (error) {
       //             console.log(error);
       //     });
       //
       //   }, //end saveReservation

     // } //end methods

     })

   </script>
   {{-- <script src="/js/load_rooms_drop_down.js"></script> --}}

@endsection
