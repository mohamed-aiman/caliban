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
            // ->where('seller_id', $request->user()->id) @todo uncomment this
            ->firstOrFail();
        return view('products.show', compact('product'));
    }

    public function index(Request $request)
    {
        $products = $this->product
            // ->where('seller_id', $request->user()->id) @todo uncomment this
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        return view('listings.index', compact('products'));
    }

    public function create(Request $request)
    {
        $categories = $this->category->select('id','name','parent_id')
            ->whereNull('parent_id')
            ->orderBy('name', 'asc')
            ->get();

        return view('listings.create', compact('categories'));
    }

    /**
     * create a new listing
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'category_id' => 'required|integer|exists:categories,id',
            'condition' => 'required|in:new,used_like_new,used,refurbished,damaged',
            'selling_format' => 'required|in:buy_now,classified',
            'price' => 'required|numeric',
            'tax' => '',
            'quantity' => '',
            'photos' => 'array',
            'photos.*.key' => '',
            'photos.*.photo_id' => 'required|exists:photos,id',
            'locations' => 'required|array',
            'locations.*' => 'required|integer|exists:locations,id',
        ]);

        if ($request->selling_format == 'buy_now') {
            $request->validate([
                'duration' => 'integer',
            ]);
        } else if ($request->selling_format == 'classified') {
            $request->validate([
                'duration' => 'integer|max:60',
            ]);
        }

        $product = $this->product->create([
            'title' => $request->title,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'condition' => $request->condition,
            'selling_format' => $request->selling_format,
            'list_till' => now()->addDays($request->duration),
            'price' => $request->price,
            'tax' => $request->tax,
            'quantity' => $request->quantity,
            'seller_id' => $request->user()->id,
        ]);

        if ($request->photos && count($request->photos) > 0) {
            foreach ($request->photos as $photo) {
                $product->photos()->attach($photo['photo_id']);
            }
        }

        if ($request->locations && count($request->locations) > 0) {
            foreach ($request->locations as $location) {
                $product->locations()->attach($location);
            }
        }

        $product->load('photos','locations');

        return response()->json([
            'message' => 'Listing created successfully',
            'product' => $product,
        ], 201);
    }
}
