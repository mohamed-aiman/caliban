@extends('layouts.guest')

@section('body')

<div class="flex flex-col items-center justify-center min-h-screen py-12 bg-gray-50 sm:px-6 lg:px-8">
    {{-- search bar start --}}
    <form method="GET" action={{ route('home') }}>
        <input type="text" name="search" placeholder="Search" value="{{ request('search') }}">
        <button type="submit">Search</button>
    </form>
    {{-- search bar end --}}

    <div class="w-full max-w-md mt-6">
        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <h1 class="text-2xl font-bold mb-4">Welcome to the Marketplace</h1>
            <p class="text-gray-700 text-base">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quod.
            </p>
        </div>
    </div>

    <div class="w-full max-w-md mt-6">
        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <h1 class="text-2xl font-bold mb-4">Featured Listings</h1>
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
        </div>
    </div>

    {{-- product list start --}}
    @foreach ($products as $product)
        <div class="w-full max-w-md mt-6 overflow-hidden bg-white rounded-lg shadow-md dark:bg-gray-800">
            <div class="px-4 py-2">
                <h1 class="text-2xl font-bold text-gray-800 dark:text-white">{{ $product->title }}</h1>
                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">{{ $product->description }}</p>
            </div>
        </div>
    @endforeach

    {{-- product list end --}}

    {{-- pagination start --}}
    {{ $products->links() }}
    {{-- pagination end --}}

</div>
@endsection
