@extends('layouts.guest-basic')

@section('body')

<div class="bg-gray-100 mx-auto min-h-screen xl:flex xl:flex-col">
{{-- <div class="bg-red-400 sm:bg-green-500 md:bg-pink-400 lg:bg-teal-600 mx-auto min-h-screen xl:flex xl:flex-col"> --}}

{{-- <div class="grid grid-cols-2 md:grid-cols-12 mx-auto w-full px-10 py-10 "> --}}
<div class="flex flex-nowrap mx-auto p-3 w-full space-x-3">
    {{-- <div class="hidden md:block"> --}}
    <div class="hidden sm:block px-3">
        <ul>
            @foreach($data['parent_categories'] as $category)
                <li>
                    <a href="{{ route('categories.products.index', $category->slug) }}" 
                        class="font-semibold text-teal-700">{{ $category->name }}</a>
                        {{-- class="font-semibold text-white">{{ $category->name }}</a> --}}
                    {{-- <a href="" class="font-bold text-blue-800">{{ $category->name }}</a> --}}
                </li>
            @endforeach
        </ul>
    </div>
    {{-- <div class="col-span-2 md:col-span-9"> --}}
    <div class="w-full sm:w-9/12">
        <div class="container mx-auto">

            {{-- selected category --}}
            @if (isset($data['selected_category']))
                <div class="py-3 mx-auto">
                    <p class="text-l font-mono font-semibold text-orange-700">
                        {{ $data['selected_category']->name }}
                    </p>
                </div>
            @endif

            {{-- product list start --}}
            <div class="">
                <ul role="list" class="grid grid-cols-2 gap-x-4 gap-y-8 sm:grid-cols-3 sm:gap-x-6 lg:grid-cols-4 xl:gap-x-8">
                    @foreach($data['products'] as $product)
                    <li onclick="goToPage('{{ route('products.show', $product->slug) }}')" class="relative bg-gray-100 shadow-lg border-2 border-gray-300 focus-within:ring-2 focus-within:ring-indigo-300 focus-within:ring-offset-2 focus-within:ring-offset-gray-100">
                        <div class="group aspect-w-10 aspect-h-7 block w-full overflow-hidden bg-gray-100">
                            @if($product->photos)
                            <img src="{{ $product->photos[0]->url }}" alt="" 
                            class="pointer-events-none object-cover group-hover:opacity-75" />
                            @else
                            <img src="https://tailwindui.com/img/ecommerce-images/product-page-01-related-product-01.jpg" alt="" class="pointer-events-none object-cover group-hover:opacity-75" />
                            @endif
                            <a href="{{ route('products.show', $product->slug) }}" class="absolute inset-0 focus:outline-none">
                            <span class="sr-only">View details for title</span>
                            </a>
                        </div>
                        <p class="px-1 pointer-events-none mt-2 block truncate text-sm font-medium text-gray-800">{{ $product->title }}</p>
                        <p class="px-1 pointer-events-none block text-l font-medium text-rose-600 font-bold">
                            <span class="text-xs font-thin">MVR </span> {{ $product->price_formatted }}
                        </p>
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

<script>
    function goToPage(url) {
        window.location.href = url;
    }
</script>

@endsection
