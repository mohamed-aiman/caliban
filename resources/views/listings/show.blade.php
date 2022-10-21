@extends('layouts.dashboard')

@section('body')
<!-- 0 -->
<div class="max-w-6xl mx-auto min-h-screen antialiased xl:flex xl:flex-col">
    <!-- 1 -->
    <div class="grid grid-cols-1 md:grid-cols-2 mx-3">
        <!-- 2 -->
        <div class="">
        <!-- photos -->
        <!-- 2.1 -->
        <div class="relative">
            <div class="max-h-200 w-full">
            <!-- <img class="mx-auto" src="https://via.placeholder.com/800"> -->
            {{-- <img class="mx-auto" :src="product.photos[0].url"> --}}
            <img class="mx-auto" src="{{ $product->photos[0]->url }}">
            </div>
        </div>
        <!-- 2.2 -->
        <div class="flex justify-start space-x-4 my-3">
            <div class="max-w-12">
            <!-- <img class="" src="https://via.placeholder.com/500"> -->
            <img class=""src="{{ $product->photos[0]->url }}">
            </div>
            <div class="max-w-12">
            <!-- <img class="" src="https://via.placeholder.com/500"> -->
            <img class=""src="{{ $product->photos[0]->url }}">
            </div>
            <div class="max-w-12">
            <!-- <img class="" src="https://via.placeholder.com/500"> -->
            <img class=""src="{{ $product->photos[0]->url }}">
            </div>
            <div class="max-w-12">
            <!-- <img class="" src="https://via.placeholder.com/500"> -->
            <img class=""src="{{ $product->photos[0]->url }}">
            </div>
        </div>
        </div>
        <!-- 3 -->
        <div class="">
        <!-- summary -->
        <div class="mx-0 md:mx-3 my-3">
            <p class="font-bold" >{{ $product->title }}</p>
            <p class="font-semibold text-orange-700" >{{ $product->price }}</p>
            <p class="font-semibold" >Condition: <span class="text-gray-700">{{ $product->condition }}</span></p>
            <p class="font-semibold" >Locations: <span class="text-gray-700">{{ $product->locations[0]->name }}</span></p>
        </div>
        </div>
        <!-- 4 -->
        <div class=" md:col-span-2 my-3">
          <p class="font-bold text-xl py-3">Description</p>
          {!! $product->description !!}
        </div>
    </div>
</div>
@endsection
