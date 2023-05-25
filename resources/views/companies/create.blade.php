@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="flex justify-between items-center">
                <h2 class="text-2xl font-semibold text-white">Create New Company</h2>
                <a class="btn btn-secondary bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded" href="{{ route('companies.index') }}">Back</a>
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

    <form action="{{ route('companies.store') }}" method="POST" class="mt-4">
        @csrf
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label for="name" class="block text-sm font-medium text-white">Name</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md @error('name') border-red-500 @enderror">
                @error('name')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="address" class="block text-sm font-medium text-white">Address</label>
                <input type="text" name="address" id="address" value="{{ old('address') }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md @error('address') border-red-500 @enderror">
                @error('address')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="mt-4">
            <button type="submit" class="btn btn-primary bg-indigo-500 hover:bg-indigo-600 text-white px-4 py-2 rounded">Create Company</button>
        </div>
    </form>
</div>
@endsection
