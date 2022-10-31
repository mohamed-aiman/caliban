<?php

namespace App\Http\Controllers;

use App\Models\Like;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function __construct(Like $like)
    {
        $this->like = $like;
    }

    protected function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|integer|exists:products,id',
        ]);

        if (!$like = $this->like->where('user_id', $request->user()->id)
            ->where('product_id', $request->product_id)
            ->first()) {
            $like = $this->like->create([
                'user_id' => $request->user()->id,
                'product_id' => $request->product_id,
            ]);
        };

        return response()->json([
            'message' => 'like success',
            'data' => $like,
        ]);
    }
    
    protected function destroy(Request $request)
    {
        $request->validate([
            'product_id' => 'required|integer|exists:products,id',
        ]);

        $like = $this->like->where('user_id', $request->user()->id)
            ->where('product_id', $request->product_id)
            ->firstOrFail();

        $like->delete();

        return response()->json([
            'message' => 'undo like success',
        ]);
    }
}
