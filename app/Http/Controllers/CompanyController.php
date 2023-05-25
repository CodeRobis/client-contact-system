<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;

class CompanyController extends Controller
{
    public function index()
    {
        $companies = Company::all();
        return view('companies.index', compact('companies'));
    }
    public function create()
    {
        return view('companies.create');
    }
    
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'address' => 'required',
        ]);
    
        Company::create($validatedData);
    
        return redirect()->route('companies.index')
            ->with('success', 'Company created successfully.');
    }

    public function show(string $id)
    {
        $company = Company::findOrFail($id);
        return view('companies.show', compact('company'));
    }

    public function edit(string $id)
    {
        $company = Company::findOrFail($id);
        return view('companies.edit', compact('company'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
        ]);
    
        $data = $request->except(['_token', '_method']);
        $company = Company::findOrFail($id);
        $company->update($data);
    
        return redirect()->route('companies.index')
                        ->with('success', 'Company updated successfully.');
    }

    public function destroy(string $id)
    {
        $company = Company::findOrFail($id);
        $company->delete();
        return redirect()->route('companies.index')
                        ->with('success','Company deleted successfully.');
    }
}