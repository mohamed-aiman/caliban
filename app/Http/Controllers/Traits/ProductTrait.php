<?php

namespace App\Http\Controllers\Traits;

trait ProductTrait {

    protected function getSelectedStore()
    {
        $user = request()->user();

        $stores = $user->stores;
        if ($stores->count() == 0) {
            // return response()->json([
            //     'message' => 'You must have at least one store to create a listing',
            // ], 422);
            $store = $user->store()->create([
                'name' => $user->name,
                // 'owner_id' => 
                'avatar_url' => $user->avatar_url,
                'phone' => $user->phone,
                'phone_2' => null,
                'email' => $user->email,
                'website' => null,
            ]);
        } else {
            // @todo handle multiple store using user_store pivot table
            // update user model stores() method to return stores from pivot 
            // after doing that let user select from his stores
            // for now one user one store
            $store = $stores->first();
        } 

        return $store;
    }
}


