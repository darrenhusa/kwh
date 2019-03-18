@extends('layout')

@section('content')
   <h1>Make Reservation</h1>

   <form action="" method="post">

     {{ csrf_field() }}

      <label for="full_name">Name</label>

      <!--  Add start date control -->

      <!--  Add end date control -->

      <!--  Add room category select control -->

      <!--  Add room select control -->

      <input type="submit" value="Save">

   </form>

@endsection
