<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryProductController extends Controller
{
    public function __construct(Category $category, Product $product)
    {
        $this->category = $category;
        $this->product = $product;
    }

    public function index(Request $request, $slug)
    {
        $category = $this->category->where('slug', $slug)
            ->with('childrenRecursive')->first();

        $categoryIds = [$category->id];
        $flattened = flatten_recursive($category->toArray());
        $categoryIds = array_merge($categoryIds, array_column($flattened, 'id'));

        $products = $this->product->whereIn('category_id', $categoryIds)
            ->get();

        $query = $this->product->whereIn('category_id', $categoryIds);

        if ($request->has('search')) {
            $query = $query->where('title', 'like', '%' . $request->search . '%');
        }

        $products = $query->with('photos','locations')->paginate(20);

        return view('home.index', compact('products'));
    }
}
