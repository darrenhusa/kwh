@extends('layout')

@section('content')

  <h1>Rooms-Index</h1>

  <table>
    <tr>
      <td>Room No</td>
      <td>Category</td>
      <td>Unavailable</td>
      <td>Needs Cleaning</td>
    </tr>
    @foreach($rooms as $room)
    <tr>
        <td>{{ $room->room_no }}</td>
        <td>{{ $room->category }}</td>
        <td>{{ $room->unavailable }}</td>
        <td>{{ $room->needs_cleaning }}</td>
    </tr>
    @endforeach
  </table>

@endsection
