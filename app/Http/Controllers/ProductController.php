<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function show($slug)
    {
        $product = $this->product->where('slug', $slug)->firstOrFail();

        $product->load('photos', 'locations', 'category');

        // dd($product->toArray());

        return view('products.show', compact('product'));
    }

    public function index(Request $request)
    {
        $products = $this->product;

        if ($request->has('search')) {
            $products = $products->where('title', 'like', '%' . $request->search . '%');
        }

        $perPage = $request->has('per_page') ? $request->per_page : 100;

        if ($perPage > 100) {
            $perPage = 100;
        }

        $products = $products->with('photos','locations','category')
            ->paginateSimple($perPage);

        // return $products;
        return view('products.index', compact('products'));
    }
}
