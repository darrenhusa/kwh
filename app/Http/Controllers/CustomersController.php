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
}
