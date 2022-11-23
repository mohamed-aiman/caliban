<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Product;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function __construct(Like $like, Product $product)
    {
        $this->like = $like;
        $this->product = $product;
    }
    
    public function index(Request $request)
    {
        $likes = request()->user()->likes()->get();
        $products = $this->product->whereIn('id', $likes->pluck('product_id'));

        $max = 20;
        $perPage = $request->has('per_page') ? $request->per_page : $max;
        if ($perPage > $max) {
            $perPage = $max;
        }

        $products = $products->with('photos','locations','category')
            ->simplePaginate($perPage);

        return $products;
    }

    protected function toggle(Request $request)
    {
        //why waste a query if we are going to fetch the product anyway
        // $request->validate([
        //     'product_id' => 'required|integer|exists:products,id',
        // ]);

        $product = $this->product->findOrFail($request->product_id);

        //testing pagination
        $products = $this->product->where('id', '<', 200)->get();
        $products->each(function($product) use ($request) {
            $like = $this->like->create([
                'user_id' => $request->user()->id,
                'product_id' => $product->id,
            ]);

            $product->update(['likes_count' => $product->likes_count + 1]);
        });

        $liked = false;
        if ($like = $this->like->where('user_id', $request->user()->id)
            ->where('product_id', $request->product_id)
            ->first()) {
            $like->delete();
            $product->update(['likes_count' => $product->likes_count - 1]);
            $liked = false;
        } else {
            $like = $this->like->create([
                'user_id' => $request->user()->id,
                'product_id' => $request->product_id,
            ]);
            $product->update(['likes_count' => $product->likes_count + 1]);
            $liked = true;
        }

        return response()->json([
            'message' => 'like toggled',
            'liked' => $liked,
        ]);
    }
}
