<?php

namespace App\Http\Controllers;
use App\Customer;

use Illuminate\Http\Request;

class CustomersController extends Controller
{
    public function index()
    {
        $customers = Customer::all();
        // $data = [
        //   'customers' => $customers,
        // ];
        // dd($data);
        // return view('customer.index', $data);
        return view('customers.index', compact('customers'));
    }

    public function create()
    {
        // display a blank form to enter a new customer

        //$customer = new Customer();

        return view('customers.create');
    }

    public function edit($id)
    {
        // Load the current customer witht he given id

        // dd('inside edit action');

        $customer = Customer::findOrFail($id);
        // return $id;

        return view('customers.edit', compact('customer'));
    }

    // public function store(Request $request)
    public function store()
    {
        // save a new customer to the db and redirect

        $customer = new Customer();

        // dd($request);

        $customer->first_name = request('first_name');
        $customer->last_name = request('last_name');

        $customer->save();

        return redirect('/customers');
    }

    public function update($id)
    {
      // dd('hello from update action');

        $customer = Customer::findOrFail($id);

        $customer->first_name = request('first_name');
        $customer->last_name = request('last_name');

        $customer->save();

        return redirect('/customers');
    }
}
