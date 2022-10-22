<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function index(Request $request)
    {
        $query = $this->product;

        if ($request->has('search')) {
            $query = $query->where('title', 'like', '%' . $request->search . '%');
        }

        $products = $query->with('photos','locations')->paginate(20);
        $parentCategories = Category::whereNull('parent_id')->get();

        $data = [
            'products' => $products,
            'parent_categories' => $parentCategories,
        ];

        return view('pages.home', compact('data'));
    }

    public function test()
    {
        return 'test';
    }
}
