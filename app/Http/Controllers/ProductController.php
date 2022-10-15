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
        $product = $this->product->where('slug', $slug)->first();
        return view('products.show', compact('product'));
    }

    public function index(Request $request)
    {
        $products = $this->product;

        if ($request->has('search')) {
            $products = $products->where('title', 'like', '%' . $request->search . '%');
        }

        $products = $products->with('photos','locations')->paginate(20);

        // return $products;
        return view('products.index', compact('products'));
    }
}
