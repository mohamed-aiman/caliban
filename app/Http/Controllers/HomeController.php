<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    public function index(Request $request)
    {
        
        // $posts = $this->post->where('status', 'PUBLISHED')->orderBy('created_at', 'DESC')->paginate(10);
        $posts = collect([
            [
                'title' => 'Architectural Engineering Wonders of the modern era for your Inspiration',
                'body' => 'Some long text for body 1',
                'image' => 'https://images.unsplash.com/photo-1610612010003-8b8b2b2b2b2b?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1050&q=80',
                'author_name' => 'John Doe',
                'published_at' => 'October 21, 2022',
                'categories' => ['Architecture', 'Engineering'],
            ],
            [
                'title' => '5 Effective Brain Recharging Activities No One is Talking About',
                'body' => 'Some long text for body 2',
                'image' => 'https://images.unsplash.com/photo-1610612010003-8b8b2b2b2b2b?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1050&q=80',
                'author_name' => 'Ahmed Ali',
                'published_at' => 'December 31, 2021',
                'categories' => ['Health', 'Wellness'],
            ],
            [
                'title' => 'How to make your own website in 2021',
                'body' => 'Some long text for body 3',
                'image' => 'https://images.unsplash.com/photo-1610612010003-8b8b2b2b2b2b?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1050&q=80',
                'author_name' => 'John Doe',
                'published_at' => 'October 21, 2022',
                'categories' => ['Technology', 'Programming'],
            ],
            [
                'title' => 'How to make your own website in 2021',
                'body' => 'Some long text for body 4',
                'image' => 'https://images.unsplash.com/photo-1610612010003-8b8b2b2b2b2b?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1050&q=80',
                'author_name' => 'John Doe',
                'published_at' => 'October 21, 2022',
                'categories' => ['Technology', 'Programming'],
            ],
            [
                'title' => 'How to make your own website in 2021',
                'body' => 'Some long text for body 5',
                'image' => 'https://images.unsplash.com/photo-1610612010003-8b8b2b2b2b2b?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1050&q=80',
                'author_name' => 'John Doe',
                'published_at' => 'October 21, 2022',
                'categories' => ['Technology', 'Programming'],
            ],
        ]);

        $topTwoPosts = $posts->take(2);
        $posts = $posts->slice(2);


        // $query = $this->post;

        // if ($request->has('q')) {
        //     $query = $query->where('title', 'like', '%' . $request->q . '%');
        // }

        // $posts = $query->with('photos','locations')->paginate(20);
        // $parentCategories = $this->category->whereNull('parent_id')->get();

        $data = [
            'posts' => $posts,
            'topTwoPosts' => $topTwoPosts,
        ];

        return view('pages.home', compact('data'));
    }

    public function test()
    {
        return 'test';
    }
}
