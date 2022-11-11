<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Product;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function __construct(Like $like)
    {
        $this->like = $like;
    }
    
    public function index(Request $request)
    {
        $likes = request()->user()->likes()->get();
        $products = Product::whereIn('id', $likes->pluck('product_id'));

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
        $request->validate([
            'product_id' => 'required|integer|exists:products,id',
        ]);

        $liked = false;
        if ($like = $this->like->where('user_id', $request->user()->id)
            ->where('product_id', $request->product_id)
            ->first()) {
            $like->delete();
            $liked = false;
        } else {
            $like = $this->like->create([
                'user_id' => $request->user()->id,
                'product_id' => $request->product_id,
            ]);
            $liked = true;
        }

        return response()->json([
            'message' => 'like toggled',
            'liked' => $liked,
        ]);
    }
}
