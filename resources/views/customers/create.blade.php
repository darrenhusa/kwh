@extends('layout')

@section('content')
   <h1>Create Customer</h1>

   <form action="/customers" method="post">

     {{ csrf_field() }}

      <label for="first_name">First Name</label>
      <input type="text" name="first_name" id="first_name" value="{{ old('first_name') }}" required>

      <label for="last_name">Last Name</label>
      <input type="text" name="last_name" id="last_name" value="{{ old('last_name') }}" required>

      <input type="submit" value="Create Customer">

      @if ($errors->any())
        <div class="">
          <ul>
            @foreach ($errors->all() as $error)
             <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif

   </form>

@endsection
