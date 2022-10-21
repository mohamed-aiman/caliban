@extends('layouts.dashboard')

@section('body')

<!-- product details page -->

{{-- <p class="font-bold text-2xl py-2">Category</p> --}}
{{-- <p>{{ $product->category->path }}</p> --}}

{{-- main container --}}
<div class="w-full flex flex-wrap">
    {{-- first row (top) --}}
    <div class="flex flex-nowrap">
        {{-- left side - main photo and thumbnails --}}
        <div>
            {{-- main photo --}}
            <div>
                <img src="{{ $product->photos ? $product->photos[0]->url : null }}" alt="">
            </div>
            {{-- thumbnails --}}
            <div>
                @foreach ($product->photos as $photo)
                <img src="{{ $photo->url }}" alt="">
                @endforeach
            </div>
        </div>
        {{-- right side - product summary --}}
        <div>
            <h1>{{ $product->title }}</h1>
            <p>{{ $product->price }}</p>
            <p>{{ $product->quantity }}</p>
            <p>{{ $product->category->name }}</p>
        </div>
    </div>
    {{-- second row (bottom) --}}
    <div>
        {{-- product description --}}
        <p class="font-bold text-2xl py-2">Description</p>
        <div>
            {!! $product->description !!}
        </div>
    </div>

</div>







<div  class="grid grid-cols-1">
    <p><span class="font-bold">slug:</span> {{ $product->slug }}</p>
    <p><span class="font-bold">title:</span> {{ $product->title }}</p>
    {{-- <p><span class="font-bold">description:</span> {{ $product->description }}</p> --}}
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
