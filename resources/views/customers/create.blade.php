@extends('layout')

@section('content')
   <h1>Create Customer</h1>

   <form action="/customers" method="post">

     {{ csrf_field() }}

      <label for="first_name">First Name</label>
      <input type="text" name="first_name" id="first_name" required>

      <label for="last_name">Last Name</label>
      <input type="text" name="last_name" id="last_name" required>

      <input type="submit" value="Create Customer">

   </form>


@endsection
