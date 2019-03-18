@extends('layout')

@section('content')
  <h1>Customer-Detail</h1>

<ul>
  <li>Id: {{ $customer->id }}</li>
  <li>First Name: {{ $customer->first_name }}</li>
  <li>Last Name: {{ $customer->last_name }}</li>
</ul>

  <a href="/customers">Back to Customers Index</a>

@endsection
