<?php

namespace App\Http\Controllers;
use App\Customer;

use Illuminate\Http\Request;

class CustomersController extends Controller
{
  // public function search($search_string)
  // {
  //   // Simple search
  //   dd($search_string);
  //
  //   $customers = Customer::search($search_string)->get();
  //
  //   return view('customers.index', compact('customers'));
  // }

    public function index()
    {
      // $search_string = 'Hen';
        $search_string = request('search_string');

        if(!empty($search_string))
        {
            // dd($search_string);

            $customers = Customer::search($search_string)->get();
        }
        else
        {
          $customers = Customer::all();
        }
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

    public function show($id)
    {
        $customer = Customer::findOrFail($id);

        return view('customers.show', compact('customer'));
    }

    public function destroy($id)
    {
      // dd('hello');
      Customer::findOrFail($id)->delete();

      return redirect('/customers');

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
