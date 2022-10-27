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

    public function search(Request $request)
    {
        $query = $this->product;

        if ($request->has('q')) {
            $query = $query->where('title', 'like', '%' . $request->q . '%');
        }

        if ($request->has('category') && $request->category != 'all') {
            $query = $query->whereIn('category_id', $this->flattenCategoryIds($request->category));
        }

        $max = 20;

        $perPage = $request->has('per_page') ? $request->per_page : $max;

        if ($perPage > $max) {
            $perPage = $max;
        }

        $products = $query->with('photos','locations')->paginate($perPage);
        
        return $products;
        // return view('pages.home', compact('data'));
    }


    protected function flattenCategoryIds($slug)
    {
        $category = $this->category->where('slug', $slug)
            ->with('childrenRecursive')->first();

        $categoryIds = [$category->id];
        $flattened = flatten_recursive($category->toArray());
        $categoryIds = array_merge($categoryIds, array_column($flattened, 'id'));

        return $categoryIds;
    }



    public function test()
    {
        return 'test';
    }
}
