@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="flex justify-between items-center">
                <h2 class="text-2xl font-semibold text-white">Companies</h2>
                <a class="btn btn-success bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded" href="{{ route('companies.create') }}">Create New Company</a>
            </div>
        </div>
    </div>
    <table class="table table-bordered w-full mt-4">
        <thead>
            <tr>
                <th class="py-2 px-4 bg-gray-800 text-white">No</th>
                <th class="py-2 px-4 bg-gray-800 text-white">Name</th>
                <th class="py-2 px-4 bg-gray-800 text-white">Address</th>
                <th class="py-2 px-4 bg-gray-800 text-white" width="280px">Action</th>
            </tr>
        </thead>
        <tbody>
            @php $i = 0; @endphp <!-- Initialize the $i variable -->
            @foreach ($companies as $company)
            <tr>
                <td class="text-white py-2 px-4">{{ ++$i }}</td>
                <td class="text-white py-2 px-4">{{ $company->name }}</td>
                <td class="text-white py-2 px-4">{{ $company->address }}</td>
                <td class="text-white py-2 px-4">
                    <form action="{{ route('companies.destroy', $company->id) }}" method="POST">
                        <a class="btn btn-primary bg-indigo-500 hover:bg-indigo-600 text-white px-3 py-1 rounded" href="{{ route('companies.edit', $company->id) }}">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
