@extends('layouts.dashboard')

@section('body')

<div class="bg-gray-300 p-10">
    
    <h1 class="text-3xl font-bold mb-5">My Listings</h1>
        
    <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="py-3 px-6">
                        Title
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Created At
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Category
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Price
                    </th>
                    <th scope="col" class="py-3 px-6">
                        <span class="sr-only">Edit</span>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $product->title }}
                    </th>
                    <td class="py-4 px-6">
                        {{ $product->created_at->format('Y-m-d H:i') }}
                    </td>
                    <td class="py-4 px-6">
                        {{ $product->category->name }}
                    </td>
                    <td class="py-4 px-6">
                        {{ $product->price }}
                    </td>
                    <td class="py-4 px-6 text-right">
                        <a href="{{ route('listings.edit', $product->slug) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="px-6 py-2 text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            {{ $products->links() }}
        </div>
    </div>

</div>
@endsection

@section('end-script')

@endsection
