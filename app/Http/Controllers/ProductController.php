<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct(Product $product, Category $category)
    {
        $this->product = $product;
        $this->category = $category;
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

        $products->appends($request->all());
        
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

        if ($request->user()) {
            $product->liked = Like::where('user_id', $request->user()->id)
                    ->where('product_id', $product->id)
                    ->exists();
        }


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
