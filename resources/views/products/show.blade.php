@extends('layouts.guest')

@section('body')
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
