@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="flex justify-between items-center">
                <h2 class="text-2xl font-semibold text-white">Customers</h2>
                <a class="btn btn-success bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded" href="{{ route('customers.create') }}">Create New Customer</a>
            </div>
        </div>
    </div>

    <div class="mt-4">
        <label for="company_filter" class="block text-sm font-medium text-white">Filter by Company</label>
        <select name="company_filter" id="company_filter" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
            <option value="">All Companies</option>
            @foreach ($companies as $company)
            <option value="{{ $company->id }}" {{ request()->input('company_filter') == $company->id ? 'selected' : '' }}>{{ $company->name }}</option>
            @endforeach
        </select>
    </div>

    <table class="table table-bordered w-full mt-4">
        <thead>
            <tr>
                <th class="py-2 px-4 bg-gray-800 text-white">No</th>
                <th class="py-2 px-4 bg-gray-800 text-white">Name</th>
                <th class="py-2 px-4 bg-gray-800 text-white">Surname</th>
                <th class="py-2 px-4 bg-gray-800 text-white">Phone</th>
                <th class="py-2 px-4 bg-gray-800 text-white">Email</th>
                <th class="py-2 px-4 bg-gray-800 text-white">Company</th>
                <th class="py-2 px-4 bg-gray-800 text-white" width="280px">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($customers as $customer)
            <tr>
                <td class="text-white py-2 px-4">{{ $customer->id }}</td>
                <td class="text-white py-2 px-4">{{ $customer->name }}</td>
                <td class="text-white py-2 px-4">{{ $customer->surname }}</td>
                <td class="text-white py-2 px-4">{{ $customer->phone }}</td>
                <td class="text-white py-2 px-4">{{ $customer->email }}</td>
                <td class="text-white py-2 px-4">{{ $customer->company ? $customer->company->name : 'N/A' }}</td>
                <td class="text-white py-2 px-4">
                    <form action="{{ route('customers.destroy', $customer->id) }}" method="POST">
                        <a class="btn btn-primary bg-indigo-500 hover:bg-indigo-600 text-white px-3 py-1 rounded" href="{{ route('customers.edit', $customer->id) }}">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded">Delete</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="7" class="text-center py-4 text-white">No customers found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

<script>
    document.getElementById('company_filter').addEventListener('change', function() {
        var selectedCompanyId = this.value;
        var url = "{{ route('customers.index') }}";
        if (selectedCompanyId) {
            url += "?company_filter=" + selectedCompanyId;
        }
        window.location.href = url;
    });
</script>
@endsection
