<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function show(Request $request, $slug)
    {
        $product = $this->product->where('slug', $slug)->firstOrFail();

        $product->load('photos', 'locations', 'category', 'seller');

        $category = $product->category;

        $links[] = [
            'name' => $category->category_name,
            'url' => route('categories.products.index', $category->category_slug),
        ];
        
        if ($category->sub_category) {
            $links[] = [
                'name' => $category->sub_category_name,
                'url' => route('categories.products.index', $category->sub_category_slug),
            ];
        }
        
        if ($category->third_level_category) {
            $links[] = [
                'name' => $category->third_level_category_name,
                'url' => route('categories.products.index', $category->third_level_category_slug),
            ];
        }
        
        if ($category->fourth_level_category) {
            $links[] = [
                'name' => $category->fourth_level_category_name,
                'url' => route('categories.products.index', $category->fourth_level_category_slug),
            ];
        }
        
        if ($category->fifth_level_category) {
            $links[] = [
                'name' => $category->fifth_level_category_name,
                'url' => route('categories.products.index', $category->fifth_level_category_slug),
            ];
        }

        $product->links = $links;

        $locations = $product->locations->pluck('name')->toArray();
        $product->locations_string = implode(', ', $locations);

  
        $product->liked = Like::where('user_id', $request->user()->id)
                ->where('product_id', $product->id)
                ->exists();


        return $product->toArray();

        // return view('products.show', compact('product', 'links'));
    }

    public function index(Request $request)
    {
        $products = $this->product;

        if ($request->has('search')) {
            $products = $products->where('title', 'like', '%' . $request->search . '%');
        }

        $max = 20;

        $perPage = $request->has('per_page') ? $request->per_page : $max;

        if ($perPage > $max) {
            $perPage = $max;
        }

        $products = $products->with('photos','locations','category')
            ->simplePaginate($perPage);

        return $products;
        // return view('products.index', compact('products'));
    }
}
