@extends('layouts.guest')

@section('body')
<table>
    <tr>
        <th>Title</th>
        <th>Description</th>
    </tr>
    @foreach($products as $product)
    <tr>
        <td><a href="{{ route('products.show', $product->slug) }}">{{ $product->title }}</a></td>
        <td>{{ $product->description }}</td>
    </tr>
    @endforeach
</table>
@endsection
