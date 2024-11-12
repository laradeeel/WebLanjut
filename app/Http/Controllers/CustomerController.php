<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Region;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        // Get all customers with their related regions
        $customers = Customer::with('region')->get();

        return view('customers.index', compact('customers'));
    }

    public function create()
    {
        // Get all regions to populate a dropdown in the form
        $regions = Region::all();
        return view('customers.create', compact('regions'));
    }

    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'region_id' => 'required|exists:regions,id',
            // ... other validation rules for customer fields
        ]);

        // Create a new customer
        Customer::create($validatedData);

        return redirect()->route('customers.index')->with('success', 'Customer created successfully.');
    }

    // Add other CRUD methods (edit, update, destroy) as needed
}
