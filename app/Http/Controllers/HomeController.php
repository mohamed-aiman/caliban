<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct(Product $product, Category $category)
    {
        $this->product = $product;
        $this->category = $category;
    }

    public function index(Request $request)
    {
        $query = $this->product;

        if ($request->has('q')) {
            $query = $query->where('title', 'like', '%' . $request->q . '%');
        }

        $products = $query->with('photos','locations')->paginate(20);
        $parentCategories = $this->category->whereNull('parent_id')->get();

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
