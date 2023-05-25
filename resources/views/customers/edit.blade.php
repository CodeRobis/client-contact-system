@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="flex justify-between items-center">
                <h2 class="text-2xl font-semibold text-white">Edit Customer</h2>
                <a class="btn btn-secondary bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded" href="{{ route('customers.index') }}">Back</a>
            </div>
        </div>
    </div>

    @if ($errors->any())
    <div class="mt-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('customers.update', $customer->id) }}" method="POST" class="mt-4">
        @csrf
        @method('PUT')
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label for="name" class="block text-sm font-medium text-white">Name</label>
                <input type="text" name="name" id="name" value="{{ $customer->name }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
            </div>
            <div>
                <label for="surname" class="block text-sm font-medium text-white">Surname</label>
                <input type="text" name="surname" id="surname" value="{{ $customer->surname }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
            </div>
        </div>

        <div class="grid grid-cols-2 gap-4 mt-4">
            <div>
                <label for="phone" class="block text-sm font-medium text-white">Phone</label>
                <input type="text" name="phone" id="phone" value="{{ $customer->phone }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
            </div>
            <div>
                <label for="email" class="block text-sm font-medium text-white">Email</label>
                <input type="email" name="email" id="email" value="{{ $customer->email }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
            </div>
        </div>

        <div class="mt-4">
            <label for="company_id" class="block text-sm font-medium text-white">Company</label>
            <select name="company_id" id="company_id" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                <option value="">Select Company</option>
                @foreach ($companies as $company)
                <option value="{{ $company->id }}" {{ $customer->company_id == $company->id ? 'selected' : '' }}>{{ $company->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mt-4">
            <button type="submit" class="btn btn-primary bg-indigo-500 hover:bg-indigo-600 text-white px-4 py-2 rounded">Update Customer</button>
        </div>
    </form>
</div>
@endsection
