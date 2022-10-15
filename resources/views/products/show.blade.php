@extends('layouts.guest')

@section('body')

<!-- product details page -->
<div class="container mx-auto">
    <div class="py-3 mx-auto">

        <!-- product photos -->
        <div class="flex flex-col-reverse lg:flex-row">
            <div class="flex-1">
                <div class="flex flex-col lg:flex-row lg:space-x-4">
                    @foreach ($product->photos as $photo)
                    <div class="flex-1 w-12 h-12 ">
                        <div class="aspect-w-1 aspect-h-1 rounded-lg overflow-hidden">
                            <img src="{{ $photo->url }}" alt="" class="w-full h-full object-center object-cover">
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="flex-1">
                <div class="aspect-w-1 aspect-h-1 rounded-lg overflow-hidden">
                    <img src="{{ $product->photos ? $product->photos[0]->url : null }}" alt="" class="w-full h-full object-center object-cover">
                </div>
            </div>
        </div>
        <!-- product photos end -->

        <!-- product details -->
        <div class="py-3 mx-auto">
            <div class="flex flex-col lg:flex-row lg:space-x-4">
                <div class="flex-1">
                    <h1 class="text-2xl font-bold text-gray-900">{{ $product->title }}</h1>
                    <p class="text-sm font-medium text-gray-500">{{ $product->price }}</p>
                </div>
                <div class="flex-1">
                    <div class="flex flex-col lg:flex-row lg:space-x-4">
                        <div class="flex-1">
                            <p class="text-sm font-medium text-gray-900">Quantity</p>
                            <p class="text-sm font-medium text-gray-500">{{ $product->quantity }}</p>
                        </div>
                        <div class="flex-1">
                            <p class="text-sm font-medium text-gray-900">Category</p>
                            <p class="text-sm font-medium text-gray-500">{{ $product->category->name }}</p>
                        </div>
                    </div>
                </div>
            </div>

    </div>
</div>









<div  class="grid grid-cols-1">
    <p><span class="font-bold">slug:</span> {{ $product->slug }}</p>
    <p><span class="font-bold">title:</span> {{ $product->title }}</p>
    <p><span class="font-bold">description:</span> {{ $product->description }}</p>
    <p><span class="font-bold">brand:</span> {{ $product->brand }}</p>
    <p><span class="font-bold">model_number:</span> {{ $product->model_number }}</p>
    <p><span class="font-bold">price:</span> {{ $product->price }}</p>
    <p><span class="font-bold">selling_price:</span> {{ $product->selling_price }}</p>
    <p><span class="font-bold">list_price:</span> {{ $product->list_price }}</p>
    <p><span class="font-bold">images:</span> {{ $product->images }}</p>
    <p><span class="font-bold">about:</span> {{ $product->about }}</p>
    {{-- <p><span class="font-bold">specification:</span> {{ $product->specification }}</p> --}}
    <p><span class="font-bold">technical_details:</span> {{ $product->technical_details }}</p>
    <p><span class="font-bold">quantity:</span> {{ $product->quantity }}</p>
    <p><span class="font-bold">unit:</span> {{ $product->unit }}</p>
    <p><span class="font-bold">details:</span> {{ $product->details }}</p>
</div>
@endsection
