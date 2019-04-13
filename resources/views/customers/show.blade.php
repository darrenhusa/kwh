@extends('layout')

@section('content')
  <h1>Customer-Detail</h1>

<ul>
  <li>Id: {{ $customer->id }}</li>
  <li>First Name: {{ $customer->first_name }}</li>
  <li>Last Name: {{ $customer->last_name }}</li>
</ul>

  <form action="/customers/{{ $customer->id }}/reservations/create" class="" method="get">
    <input type="submit" name="" value="Make Reservation">
  </form>
  <form class="" action="/customers/{{ $customer->id }}/check_in" method="get">
    <input type="submit" name="" value="Check In">
  </form>
  <form action="/customers/{{ $customer->id }}/check_out" class="" method="get">
    <input type="submit" name="" value="Check Out">
  </form>

  <a href="/customers">Back to Customers Index</a>

@endsection
