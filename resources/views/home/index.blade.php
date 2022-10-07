@extends('layouts.guest')

@section('body')

<div class="flex flex-col items-center justify-center min-h-screen py-12 bg-gray-50 sm:px-6 lg:px-8">
    {{-- search bar start --}}
    <form method="GET" action={{ route('home') }}>
        <input type="text" name="search" placeholder="Search" value="{{ request('search') }}">
        <button type="submit">Search</button>
    </form>
    {{-- search bar end --}}

    {{-- product list start --}}
    <table>
        <tr>
            <th class="border border-green-800">title</th>
            {{-- <th class="border border-green-800">description</th> --}}
            {{-- <th class="border border-green-800">brand</th> --}}
            {{-- <th class="border border-green-800">model_number</th> --}}
            {{-- <th class="border border-green-800">price</th> --}}
            <th class="border border-green-800">selling_price</th>
            {{-- <th class="border border-green-800">list_price</th> --}}
            {{-- <th class="border border-green-800">images</th> --}}
            {{-- <th class="border border-green-800">about</th> --}}
            {{-- <th class="border border-green-800">specification</th> --}}
            {{-- <th class="border border-green-800">technical_details</th> --}}
            {{-- <th class="border border-green-800">quantity</th> --}}
            {{-- <th class="border border-green-800">unit</th> --}}
            {{-- <th class="border border-green-800">details</th> --}}
        </tr>
        </tr>
        @foreach($products as $product)
        <tr>
            <td class="border border-green-800"><a href="{{ route('products.show', $product->slug) }}">{{ $product->title }}</a></td>
            {{-- <td class="border border-green-800">{{ $product->description }}</td> --}}
            {{-- <td class="border border-green-800">{{ $product->brand }}</td> --}}
            {{-- <td class="border border-green-800">{{ $product->model_number }}</td> --}}
            {{-- <td class="border border-green-800">{{ $product->price }}</td> --}}
            <td class="border border-green-800">{{ $product->selling_price }}</td>
            {{-- <td class="border border-green-800">{{ $product->list_price }}</td> --}}
            {{-- <td class="border border-green-800">{{ $product->images }}</td> --}}
            {{-- <td class="border border-green-800">{{ $product->about }}</td> --}}
            {{-- <td class="border border-green-800">{{ $product->specification }}</td> --}}
            {{-- <td class="border border-green-800">{{ $product->technical_details }}</td> --}}
            {{-- <td class="border border-green-800">{{ $product->quantity }}</td> --}}
            {{-- <td class="border border-green-800">{{ $product->unit }}</td> --}}
            {{-- <td class="border border-green-800">{{ $product->details }}</td> --}}
        </tr>
        @endforeach
    </table>
    {{-- product list end --}}

    {{-- pagination start --}}
    {{ $products->links() }}
    {{-- pagination end --}}

</div>
@endsection
