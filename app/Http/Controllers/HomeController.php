<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function index(Request $request)
    {
        $products = $this->product;

        if ($request->has('search')) {
            $products = $products->where('title', 'like', '%' . $request->search . '%');
        }

        $products = $products->paginate(20);

        return view('home.index', compact('products'));
    }

    public function test()
    {
        return 'test';
    }
}
