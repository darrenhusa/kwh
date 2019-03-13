<h1>Customer-Index</h1>

<table>
  <tr>
    <td>Id</td>
    <td>First Name</td>
    <td>Last Name</td>
  </tr>
  @foreach($customers as $customer)
  <tr>
      <td>{{ $customer->id }}</td>
      <td>{{ $customer->first_name }}</td>
      <td>{{ $customer->last_name }}</td>
  </tr>
  @endforeach
</table>
