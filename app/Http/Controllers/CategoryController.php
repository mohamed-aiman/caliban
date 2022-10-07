<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * onetime use
     * download category lists from shoppee API
     * https://seller.shopee.com.my/edu/category-guide/
     */
    public function downloadCategoriesFromShoppee()
    {
        $links = [];

        // for ($i = 1; $i <= 23; $i++) {
        //     $links[$i] = "https://seller.shopee.com.my/help/api/v3/global_category/list/?page=$i&size=48";
        // }
        
        for ($i = 1; $i <= 2; $i++) {
            $links[$i] = "https://seller.shopee.com.my/help/api/v3/global_category/list/?page=$i&size=1000";
        }
        
        //download links as json and write to json files
        foreach ($links as $key => $link) {
            dump($key);
            dump($link);
            $json = file_get_contents($link);
            $filename = '1000_' . ($key) . '.json';
            dump($filename);
            file_put_contents(storage_path('app/shoppee-categories/' . $filename), $json);
        }
    }

    public function index()
    {
        $categories = \App\Models\Category::all();
        // return $categories;
        return view('categories.index', compact('categories'));

    }
}
