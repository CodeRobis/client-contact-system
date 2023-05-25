<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Company;


class CustomerController extends Controller
{
    public function index(Request $request)
    {
        $companyId = $request->input('company_filter');
        $companies = Company::all(); // Retrieve all companies
        $customers = Customer::when($companyId, function ($query) use ($companyId) {
            $query->where('company_id', $companyId);
        })->get();
    
        return view('customers.index', compact('customers', 'companies'));
    }
    
    

    public function create()
    {
        $companies = Company::all();
        return view('customers.create', compact('companies'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'surname' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
        ]);
    
        $data = $request->except('_token');
    
        Customer::create($data);
    
        return redirect()->route('customers.index')
            ->with('success', 'Customer created successfully.');
    }

    public function show(string $id)
    {
        $customer = Customer::findOrFail($id);
        return view('customers.show', compact('customer'));
    }

    public function edit(string $id)
    {
        $customer = Customer::findOrFail($id);
        $companies = Company::all();
        return view('customers.edit', compact('customer', 'companies'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'surname' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
        ]);

        $customer = Customer::findOrFail($id);
        $customer->update($request->all());
        return redirect()->route('customers.index')
                        ->with('success','Customer updated successfully.');
    }

    public function destroy(string $id)
    {
        $customer = Customer::findOrFail($id);
        $customer->delete();
        return redirect()->route('customers.index')
                        ->with('success','Customer deleted successfully.');
    }
}
