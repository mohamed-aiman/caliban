<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ListingController extends Controller
{
    public function __construct(Product $product, Category $category)
    {
        $this->product = $product;
        $this->category = $category;
    }

    public function show(Request $request, $slug)
    {
        $product = $this->product
            ->where('slug', $slug)
            ->where('seller_id', $request->user()->id)
            ->firstOrFail();
        return view('products.show', compact('product'));
    }

    public function create(Request $request)
    {
        $categories = $this->category->select('id','name','parent_id')
            ->whereNull('parent_id')
            ->orderBy('name', 'asc')
            ->get();

        return view('products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        dd($request->all());
    }
}
