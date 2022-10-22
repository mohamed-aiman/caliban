@extends('layouts.guest-basic')

@section('body')

<div class="max-w-6xl mx-auto min-h-screen antialiased xl:flex xl:flex-col">

<div id="app" class="grid grid-cols-12 mx-auto w-full px-10 py-10">
    <div class="col-span-2">
        <ul>
            @foreach($data['parent_categories'] as $category)
                <li>
                    <a href="{{ route('categories.products.index', $category->slug) }}" 
                        class="font-semibold text-teal-700">{{ $category->name }}</a>
                    {{-- <a href="" class="font-bold text-blue-800">{{ $category->name }}</a> --}}
                </li>
            @endforeach
        </ul>

    </div>
    <div class="col-span-10">
        <div class="container mx-auto">

            {{-- selected category --}}
            @if (isset($data['selected_category']))
                <div class="py-3 mx-auto">
                    <p class="text-l font-mono font-semibold text-orange-700">
                        {{ $data['selected_category']->name }}
                    </p>
                </div>
            @endif

            {{-- search bar start --}}
            <div class="py-3 mx-auto">
                <form method="GET" action={{ route('home') }}>
                    <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-gray-300">Search</label>
                    <div class="relative">
                        <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                            <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                        </div>
                        <input type="search" 
                            id="search" 
                            name="search" 
                            value="{{ request('search') }}"
                            placeholder="Search for listings..." 
                            required=""
                            class="block p-4 pl-10 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border 
                            border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 
                            dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 
                            dark:focus:border-blue-500" 
                            >
                        <button type="submit" class="text-white absolute right-2.5 bottom-2.5 bg-blue-700 
                            hover:bg-blue-800 focus:ring-4 focus:outline-none 
                            focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 
                            dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                            >
                            Search
                        </button>
                    </div>
                </form>
            </div>
            {{-- search bar end --}}
            {{-- product list start --}}
            <div>
                <ul role="list" class="grid grid-cols-2 gap-x-4 gap-y-8 sm:grid-cols-3 sm:gap-x-6 lg:grid-cols-4 xl:gap-x-8">
                    @foreach($data['products'] as $product)
                    <li class="relative">
                    <div class="group aspect-w-10 aspect-h-7 block w-full overflow-hidden rounded-lg bg-gray-100 focus-within:ring-2 focus-within:ring-indigo-500 focus-within:ring-offset-2 focus-within:ring-offset-gray-100">
                        @if($product->photos)
                        <img src="{{ $product->photos[0]->url }}" alt="" class="pointer-events-none object-cover group-hover:opacity-75" />
                        @else
                        <img src="https://tailwindui.com/img/ecommerce-images/product-page-01-related-product-01.jpg" alt="" class="pointer-events-none object-cover group-hover:opacity-75" />
                        @endif
                        <a href="{{ route('products.show', $product->slug) }}" class="absolute inset-0 focus:outline-none">
                        <span class="sr-only">View details for title</span>
                        </a>
                    </div>
                    <p class="pointer-events-none mt-2 block truncate text-sm font-medium text-gray-900">{{ $product->title }}</p>
                    <p class="pointer-events-none block text-sm font-medium text-gray-500">{{ $product->price }}</p>
                    </li>
                    @endforeach
                </ul>
            </div>
            {{-- product list end --}}
            {{-- pagination start --}}
            <div class="mt-8 mx-auto">
                {{ $data['products']->links() }}
            </div>
            {{-- pagination end --}}

        </div>
    </div>
</div>

</div>
@endsection
