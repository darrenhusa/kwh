@extends('layout')

@section('content')

  <h1>Reservations-Index</h1>

  <table>
    <tr>
      <td>Reservation No</td>
      <td>Room No</td>
      <td>Start Date</td>
      <td>End Date</td>
      <td>Amount</td>
      <td>Customer No</td>
      <td>Created At</td>
      <td>Updated At</td>
    </tr>
    @foreach($reservations as $reservation)
      <tr>
          <td>{{ $reservation->reservation_no }}</td>
          <td>{{ $reservation->room_no }}</td>
          <td>{{ $reservation->start_date }}</td>
          <td>{{ $reservation->end_date }}</td>
          <td>{{ $reservation->amount }}</td>
          <td>{{ $reservation->customer_no }}</td>
          <td>{{ $reservation->created_at }}</td>
          <td>{{ $reservation->updated_at }}</td>
      </tr>
    @endforeach
  </table>

  <p>
    <a href="http://localhost:8000/">Home Page</a>
  </p>

@endsection
