@extends('layout')

@section('content')
   <h1>Edit Customer</h1>

   <form action="/customers/{{ $customer->id }}" method="post">

     {{ method_field('PATCH')}}
     {{ csrf_field() }}

      <label for="first_name">First Name</label>
      <input type="text" name="first_name" id="first_name" value="{{ $customer->first_name }}">

      <label for="last_name">Last Name</label>
      <input type="text" name="last_name" id="last_name" value="{{ $customer->last_name }}">

      <input type="submit" value="Update Customer">

   </form>

   <form action="/customers/{{ $customer->id }}" method="post">
     {{ method_field('DELETE')}}
     {{ csrf_field() }}

     <input type="submit" value="Delete Customer">
   </form>


@endsection
