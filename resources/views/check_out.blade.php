<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Check Out</title>
</head>
<body>
  <h1>Check Out</h1>

  <p>Customer: {{ $customer->id }}</p>
  <p>{{ $customer->last_name }}, {{ $customer->first_name }}</p>
  <p>Start Date: {{ $current_reservation->start_date }}</p>
  <p>End Date: {{ $current_reservation->end_date }}</p>
  <p>Days: {{ $bill['days'] }}</p>
  <br />
  <p>Room Number: {{ $current_reservation->room_no }}</p>
  <p>Room Type: {{ $bill['category'] }}</p>
  <p>Room Rate: {{ $bill['rate'] }}</p>
  <p>Room Charge: {{ $bill['room_charges'] }}</p>
  <p>Taxes: {{ $bill['taxes'] }}</p>
  <p>Total Amount: {{ $bill['total_charges'] }}</p>


</body>
</html>
