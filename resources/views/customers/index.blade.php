@extends('layout')

@section('content')
  <h1>Customer-Index</h1>

  <!--  Add a customer search -->
  <!--  Try https://github.com/nicolaslopezj/searchable -->

  <form action="/customers/" method="get">

    <label for="search_string">Find by Name: </label>
    <input type="text" name="search_string" id="search_string">
      <input type="submit" value="Search">
  </form>

  <table>
    <tr>
      <td>Id</td>
      <td>First Name</td>
      <td>Last Name</td>
      <td>Actions</td>
    </tr>
    @foreach($customers as $customer)
    <tr>
        <td>{{ $customer->id }}</td>
        <td>{{ $customer->first_name }}</td>
        <td>{{ $customer->last_name }}</td>
        <td>
          <form action="/customers/{{ $customer->id }}" method="get">
              <input type="submit" value="View Details">
          </form>
          </td>
    </tr>
    @endforeach
  </table>

    <p>
      <a href="http://localhost:8000/">Home Page</a>
    </p>

@endsection
