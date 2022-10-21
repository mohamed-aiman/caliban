@extends('layouts.guest-basic')

@section('body')
<!-- 0 -->
<div class="max-w-6xl mx-auto min-h-screen antialiased xl:flex xl:flex-col">

    <div class="mx-3">
        <p class="text-l font-mono font-semibold text-orange-700">
        @foreach ($links as $key => $link)
            @if($key != 0)
                <span class="text-gray-600"> > </span>
            @endif
            <a href="{{ $link['url'] }}">{{ $link['name'] }}</a>
        @endforeach
        </p>
    </div>


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
            <img id="loadedPhoto" class="mx-auto" src="{{ $product->photos[0]->url }}">
            </div>
        </div>
        <!-- 2.2 -->
        <div class="flex justify-start space-x-4 my-3">
            @foreach($product->photos as $photo)
            <div class="max-w-12">
                <!-- <img class="" src="https://via.placeholder.com/500"> -->
                <img onclick="loadPhoto(event, '{{ $photo->url }}')" 
                    class="photo-options border border-2 rounded rounded-md cursor-pointer
                    {{ $loop->first ? 'border-teal-700' : '' }}"
                    " 
                    src="{{ $photo->url }}">
            </div>
            @endforeach
        </div>
        </div>
        <!-- 3 -->
        <div class="">
        <!-- summary -->
        <div class="mx-0 md:mx-3 my-3 space-y-2">
            <p class="font-bold text-xl" >{{ $product->title }}</p>
            <p class="font-semibold text-xl text-orange-700" ><span class="text-sm">MVR</span> {{ $product->price_formatted }}</p>
            <p class="font-semibold" >Condition: <span class="text-gray-700">{{ $product->condition }}</span></p>
            <p class="font-semibold" >Locations: <span class="text-gray-700">{{ $product->locations[0]->name }}</span></p>
            {{-- seller details --}}
            <div class="border border-gray-600 border-8">
                <p>Seller Details</p>
                <p class="text-gray-700">{{ $product->seller->username }}</p>
                <p class="text-gray-700">{{ $product->seller->phone }}</p>
            </div>

        </div>
        </div>
        <!-- 4 -->
        <div class=" md:col-span-2 my-3">
          <p class="font-bold text-xl py-3">Description</p>
          {!! $product->description !!}
        </div>
    </div>
</div>





{{-- <div  class="grid grid-cols-1">
    <p><span class="font-bold">slug:</span> {{ $product->slug }}</p>
    <p><span class="font-bold">title:</span> {{ $product->title }}</p>
    <p><span class="font-bold">description:</span> {{ $product->description }}</p>
    <p><span class="font-bold">brand:</span> {{ $product->brand }}</p>
    <p><span class="font-bold">model_number:</span> {{ $product->model_number }}</p>
    <p><span class="font-bold">price:</span> {{ $product->price }}</p>
    <p><span class="font-bold">selling_price:</span> {{ $product->selling_price }}</p>
    <p><span class="font-bold">list_price:</span> {{ $product->list_price }}</p>
    <p><span class="font-bold">images:</span> {{ $product->images }}</p>
    <p><span class="font-bold">about:</span> {{ $product->about }}</p> --}}
    {{-- <p><span class="font-bold">specification:</span> {{ $product->specification }}</p> --}}
    {{-- <p><span class="font-bold">technical_details:</span> {{ $product->technical_details }}</p>
    <p><span class="font-bold">quantity:</span> {{ $product->quantity }}</p>
    <p><span class="font-bold">unit:</span> {{ $product->unit }}</p>
    <p><span class="font-bold">details:</span> {{ $product->details }}</p>
</div> --}}
@endsection

@section('end-script')
<script>
    var selectedPhoto = document.getElementById('loadedPhoto');
    var photoOptions = document.getElementsByClassName('photo-options');
    function loadPhoto(event, photoUrl) {
        selectedPhoto.src = event.target.src;
        for (let i = 0; i < photoOptions.length; i++) {
            photoOptions[i].classList.remove('border-teal-700');
        }
        event.target.classList.add('border-teal-700');
    }
</script>
@endsection
