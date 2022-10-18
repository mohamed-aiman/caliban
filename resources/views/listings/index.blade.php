@extends('layouts.dashboard')

@section('body')

<div class="bg-gray-300 p-10">
    <h1>My Listings</h1>

    <div class="flex flex-wrap">
        @foreach ($products as $product)
            <div class="w-1/3 p-4">
                <div class="bg-white rounded-lg shadow-lg p-4">
                    <h2 class="text-xl font-bold">{{ $product->title }}</h2>
                    <p class="text-gray-600">{{ $product->description }}</p>
                </div>
            </div>
        @endforeach

</div>
@endsection

@section('end-script')

@endsection
