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
  number_format ( float $number [, int $decimals = 0 ] )

  <p>Room Number: {{ $current_reservation->room_no }}</p>
  <p>Room Type: {{ $bill['category'] }}</p>
  <p>Room Rate: ${{ number_format($bill['rate'], 2) }}</p>
  <p>Room Charge: ${{ number_format($bill['room_charges'], 2) }}</p>
  <p>Taxes: ${{ number_format($bill['taxes'], 2) }}</p>
  <p>Total Amount: ${{ number_format($bill['total_charges'], 2) }}</p>

  <p>
    <a href="http://localhost:8000/">Home Page</a>
  </p>

</body>
</html>
