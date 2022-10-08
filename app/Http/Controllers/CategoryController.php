<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function __construct(Category $category)
    {
        $this->category = $category;
    }

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

    /**
     * DOES NOT WORK DUE TO API LIMITATION
     * onetime use
     * download category lists from ibay API
     */
    public function downloadCategoriesFromIbay()
    {
        $links = [];
        
        for ($i = 1; $i <= 601; $i++) {
            $links[$i] = "https://ibay.com.mv/index.php?page=cat_ajax&id=$i";
        }
        
        //download links as json and write to json files
        foreach ($links as $key => $link) {
            dump($key);
            dump($link);
            $json = $this->getWebsite($link);
            dd($json);
            // $json = file_get_contents($link);
            $filename = ($key) . '.json';
            dump($filename);
            file_put_contents(storage_path('app/ibay-categories/' . $filename), $json);
        }
    }

    public function getWebsite($url='http://mywebsite.com'){
        
        $ch = curl_init();
        $user_agent='Mozilla/5.0 (Windows NT 6.1; rv:8.0) Gecko/20100101 Firefox/'.rand(8,100).'.0';
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_AUTOREFERER, false);
        curl_setopt($ch, CURLOPT_VERBOSE, 1);
        curl_setopt($ch, CURLOPT_HEADER, 0);

        curl_setopt($ch, CURLOPT_USERAGENT, $user_agent);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSLVERSION,CURL_SSLVERSION_DEFAULT);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $webcontent= curl_exec ($ch);
        $error = curl_error($ch); 
        curl_close ($ch);
        return  $webcontent;

    }

    public function show($id)
    {
        $category = $this->category->find($id);

        $category->path = $category->path();

        return $category;
    }

    public function children($id)
    {
        return $this->category->where('parent_id', $id)->get();
    }

    public function parents()
    {
        return $this->category->whereNull('parent_id')->get();
    }

    public function index()
    {
        $categories = $this->category->orderBy('level','asc')->get();
        // return $categories;
        return view('categories.index', compact('categories'));

    }
}
