<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Traits\ProductTrait;

class ListingController extends Controller
{
    use ProductTrait;

    public function __construct(Product $product, Category $category)
    {
        $this->product = $product;
        $this->category = $category;
    }

    public function show(Request $request, $slug)
    {
        $product = $this->product
            ->where('slug', $slug)
            ->where('seller_id', $this->getSelectedStore()->id)
            ->firstOrFail();

        $product->load('photos', 'locations', 'category');

        return view('listings.show', compact('product'));
    }

    public function index(Request $request)
    {
        $products = $this->product
            ->with('category')
            ->where('seller_id', $this->getSelectedStore()->id)
            ->orderBy('created_at', 'desc')
            ->paginate(50);

        return $products;
    }

    public function create(Request $request)
    {
        //reddirect to login if not logged in
        if (!$request->user()) {
            return redirect()->route('login');
        } else {
            return redirect('dashboard/listings/create');
        }
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
            // 'duration' => 'required|integer',
            'price' => 'required|numeric',
            'tax' => '',
            'quantity' => '',
            'photos' => 'array',
            'photos.*' => 'required|integer|exists:photos,id',
            'locations' => 'required|array',
            'locations.*' => 'required|integer|exists:locations,id',
        ]);

        if ($request->selling_format == 'buy_now') {
            $request->validate([
                'duration' => '',
            ]);
        } else if ($request->selling_format == 'classified') {
            $request->validate([
                'duration' => 'integer|max:60',
            ]);
        }

        try {
            $this->category->where('is_selectable', true)->findOrFail($request->category_id);
        } catch(\Exception $e) {
            return response()->json([
                'message' => 'Invalid category',
            ], 422);
        }

        $product = $this->product->create([
            'title' => $request->title,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'condition' => $request->condition,
            'selling_format' => $request->selling_format,
            'duration' => $request->duration,
            'list_till' => now()->addDays($request->duration),
            'price' => $request->price,
            'tax' => $request->tax,
            'quantity' => $request->quantity,
            'seller_id' => $this->getSelectedStore()->id,
            'user_id' => $request->user()->id,
        ]);

        if ($request->photos && count($request->photos) > 0) {
            foreach ($request->photos as $photo) {
                $product->photos()->attach($photo);
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

    public function edit(Request $request, $slug)
    {
        $product = $this->product
            ->where('slug', $slug)
            ->where('seller_id', $this->getSelectedStore()->id) //
            ->firstOrFail();

        $product->load('photos', 'locations', 'category');

        $categories = $this->category->select('id','name','parent_id')
            ->whereNull('parent_id')
            ->orderBy('name', 'asc')
            ->get();

        return view('listings.edit', compact('categories', 'slug'));
    }
    
    /**
     * update a listing
     *
     * @param Request $request
     * @param string $slug
     * @return JsonResponse
     */
    public function update(Request $request, $slug)
    {
        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'category_id' => 'required|integer|exists:categories,id',
            'condition' => 'required|in:new,used_like_new,used,refurbished,damaged',
            'selling_format' => 'required|in:buy_now,classified',
            // 'duration' => 'required|integer',
            'price' => 'required|numeric',
            'tax' => '',
            'quantity' => '',
            'photos' => 'array',
            'photos.*' => 'required|integer|exists:photos,id',
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

        try {
            $this->category->where('is_selectable', true)->findOrFail($request->category_id);
        } catch(\Exception $e) {
            return response()->json([
                'message' => 'Invalid category',
            ], 422);
        }

        $product = $this->product
            ->where('slug', $slug)
            ->where('seller_id', $this->getSelectedStore()->id) //
            ->firstOrFail();

        $product->update([
            'title' => $request->title,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'condition' => $request->condition,
            'selling_format' => $request->selling_format,
            'duration' => $request->duration,
            'list_till' => now()->addDays($request->duration),
            'price' => $request->price,
            'tax' => $request->tax,
            'quantity' => $request->quantity,
            // 'seller_id' => $store->id,
        ]);

        if ($request->photos && count($request->photos) > 0) {
            $product->photos()->sync($request->photos);
        }

        if ($request->locations && count($request->locations) > 0) {
            $product->locations()->sync($request->locations);
        }

        $product->load('photos','locations');

        return response()->json([
            'message' => 'Listing updated successfully',
            'product' => $product,
        ], 200);
    }

    public function productFormData(Request $request, $slug)
    {
        $product = $this->product
        ->where('slug', $slug)
        ->where('seller_id', $this->getSelectedStore()->id)//
        ->firstOrFail();
        
        $product->load('photos', 'locations', 'category');

        // form: {
        //   title: '',
        //   description: '',
        //   category_id: null,//id set to 101061 for testing null default
        //   condition: '',
        //   selling_format: '',
        //   duration: '',
        //   quantity: '',
        //   price: '',
        //   tax: '',
        //   locations: [],
        //   photos: [],
        // },

        $formData = [
            'title' => $product->title,
            'description' => $product->description,
            'description_delta' => json_decode($product->description_delta),
            'category_id' => $product->category_id,
            'condition' => $product->condition,
            'selling_format' => $product->selling_format,
            'duration' => $product->duration,
            'price' => $product->price,
            'tax' => $product->tax,
            'quantity' => $product->quantity,
            'locations' => $product->locations->pluck('id')->toArray(),
            'photos' => $product->photos->pluck('id')->toArray(),
        ];

        return response()->json([
            'form' => $formData,
            'category' => $product->category,
            'photos' => $product->photos,
        ], 200);
    }

    public function isActiveToggle(Request $request)
    {
        $product = $this->product
            ->where('id', $request->product_id)
            ->where('seller_id', $this->getSelectedStore()->id) //
            ->firstOrFail();

        $product->update([
            'is_active' => !$product->is_active,
        ]);

        return response()->json([
            'message' => 'Listing updated successfully',
            'product' => $product,
        ], 200);
    }

    public function decrementQuantity(Request $request)
    {
        $product = $this->product
            ->where('id', $request->product_id)
            ->where('seller_id', $this->getSelectedStore()->id) //
            ->firstOrFail();

        $product->update([
            'quantity' => ($product->quantity == 0) ? 0 : $product->quantity - 1
        ]);

        return response()->json([
            'message' => 'Listing updated successfully',
            'product' => $product,
        ], 200);
    }

    public function incrementQuantity(Request $request)
    {
        $product = $this->product
            ->where('id', $request->product_id)
            ->where('seller_id', $this->getSelectedStore()->id) //
            ->firstOrFail();

        $product->update([
            'quantity' => $product->quantity + 1
        ]);

        return response()->json([
            'message' => 'Listing updated successfully',
            'product' => $product,
        ], 200);
    }

    public function updateQuantity(Request $request)
    {
        $request->validate([
            'quantity' => 'required|integer',
            'product_id' => 'required|integer',
        ]);

        $product = $this->product
            ->where('id', $request->product_id)
            ->where('seller_id', $this->getSelectedStore()->id) //
            ->firstOrFail();

        $product->update([
            'quantity' => ($request->quantity < 0) ? 0 : $request->quantity
        ]);

        return response()->json([
            'message' => 'Listing updated successfullyx',
            'product' => $product,
        ], 200);
    }

    public function updatePrice(Request $request)
    {
        $request->validate([
            'price' => 'required|numeric',
            'product_id' => 'required|integer',
        ]);

        $product = $this->product
            ->where('id', $request->product_id)
            ->where('seller_id', $this->getSelectedStore()->id) //
            ->firstOrFail();

        $product->update([
            'price' => $request->price
        ]);

        return response()->json([
            'message' => 'Listing updated successfully',
            'product' => $product,
        ], 200);
    }
}
