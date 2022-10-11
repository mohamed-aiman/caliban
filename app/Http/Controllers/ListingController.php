<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        $request->validate([
          'title' => 'required|text',
          'description' => 'required|text',
          'category_id' => 'required|integer|exists:categories,id',
          'condition' => 'required|in:new,used_like_new,used,refurbished,damaged',
          'selling_format' => 'required|in:buy_now,classified',
          'duration' => 'required|integer|max:60',
          'price' => 'required|numeric',
          'tax' => '',
          'quantity' => '',
        //   'islands' => 'required|array',
        //   'islands.*' => 'required|integer|exists:islands,id',
        ]);

        if ($request->selling_format == 'buy_now') {
            $request->validate([
                'quantity' => 'required|integer',
            ]);
        } else if ($request->selling_format == 'classified') {
            $request->validate([
              'price' => 'required|numeric',
            ]);
        }

        $product = $this->product->create([
          'title' => $request->title,
          'description' => $request->description,
          'category_id' => $request->category_id,
          'condition' => $request->condition,
          'selling_format' => $request->selling_format,
          'selling_format_details' => $request->selling_format_details,
          'seller_id' => $request->user()->id,
        ]);


    }
    
    /**
     * upload and save the uploaded photo local and return url
     */
    public function uploadPhoto(Request $request)
    {
        $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $photo = $request->file('photo');
        $photoName = time().'.'.$photo->extension();
        $photoPath = $photo->storeAs('products', $photoName, 'public');

        return $photoPath;
        dd($photoPath);
    }
}
