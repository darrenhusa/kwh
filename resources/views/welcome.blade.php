<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>King William Hotel</title>

    </head>
    <body>
      <h1>King William Hotel</h1>
        <div class="links">
          <ul>
            <li><a href="http://localhost:8000/customers">Customers Index</a></li>
            <li><a href="http://localhost:8000/reservations">Reservations Index</a></li>
            <li><a href="http://localhost:8000/rooms">Rooms Index</a></li>
            <li><a href="http://localhost:8000/customer/show_current">TEST SHOW CURRENT RESERVATIONS</a></li>
            <li><a href="http://localhost:8000/available_rooms">TEST ROOMS JSON</a></li>
            <li><a href="http://localhost:8000/get_bill">TEST GET BILL</a></li>
          </ul>
        </div>
    </body>
</html>
