<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function view_create_page()
    {
        return view('customer_data');
    }

    public function view_customer_data_page()
    {
        $customers = Customer::all(); // Fetch all customers from the database
        return view('show', compact('customers'));
    }

    public function store(Request $request)
    {
        Customer::create($request->all());
        // return $request;
        // Redirect back with success message
        return redirect()->back()->with('success', 'Customer data has been saved successfully!');
    }
}
