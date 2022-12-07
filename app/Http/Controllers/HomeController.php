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
                'id' => 1,
                'slug' => 'xarchitectural-engineering-wonders-of-the-modern-era-for-your-inspiration',
                'title' => 'xArchitectural Engineering Wonders of the modern era for your Inspiration',
                'body' => 'Some long text for body 1',
                'image' => 'https://cdn.sanity.io/images/e4rzjq6v/production/05951a0ec1a6ffc54f615ab160649e92fea982d0-800x764.png?rect=0,0,800,468&amp;w=3840&amp;q=75&amp;fit=clip&amp;auto=format',
                'srcset' => 'https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=16&amp;q=75&amp;fit=clip&amp;auto=format 16w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=32&amp;q=75&amp;fit=clip&amp;auto=format 32w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=48&amp;q=75&amp;fit=clip&amp;auto=format 48w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=64&amp;q=75&amp;fit=clip&amp;auto=format 64w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=96&amp;q=75&amp;fit=clip&amp;auto=format 96w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=128&amp;q=75&amp;fit=clip&amp;auto=format 128w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=256&amp;q=75&amp;fit=clip&amp;auto=format 256w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=384&amp;q=75&amp;fit=clip&amp;auto=format 384w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=640&amp;q=75&amp;fit=clip&amp;auto=format 640w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=750&amp;q=75&amp;fit=clip&amp;auto=format 750w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=828&amp;q=75&amp;fit=clip&amp;auto=format 828w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=1080&amp;q=75&amp;fit=clip&amp;auto=format 1080w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=1200&amp;q=75&amp;fit=clip&amp;auto=format 1200w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=1920&amp;q=75&amp;fit=clip&amp;auto=format 1920w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=2048&amp;q=75&amp;fit=clip&amp;auto=format 2048w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=3840&amp;q=75&amp;fit=clip&amp;auto=format 3840w',
                'author_name' => 'John Doe',
                'author_image' => 'https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=3840&amp;q=75&amp;fit=clip&amp;auto=format',
                'author_srcset' => 'https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=16&amp;q=75&amp;fit=clip&amp;auto=format 16w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=32&amp;q=75&amp;fit=clip&amp;auto=format 32w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=48&amp;q=75&amp;fit=clip&amp;auto=format 48w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=64&amp;q=75&amp;fit=clip&amp;auto=format 64w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=96&amp;q=75&amp;fit=clip&amp;auto=format 96w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=128&amp;q=75&amp;fit=clip&amp;auto=format 128w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=256&amp;q=75&amp;fit=clip&amp;auto=format 256w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=384&amp;q=75&amp;fit=clip&amp;auto=format 384w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=640&amp;q=75&amp;fit=clip&amp;auto=format 640w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=750&amp;q=75&amp;fit=clip&amp;auto=format 750w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=828&amp;q=75&amp;fit=clip&amp;auto=format 828w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=1080&amp;q=75&amp;fit=clip&amp;auto=format 1080w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=1200&amp;q=75&amp;fit=clip&amp;auto=format 1200w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=1920&amp;q=75&amp;fit=clip&amp;auto=format 1920w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=2048&amp;q=75&amp;fit=clip&amp;auto=format 2048w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=3840&amp;q=75&amp;fit=clip&amp;auto=format 3840w',
                'published_at' => 'October 21, 2022',
                'tags' => ['Architecture', 'Engineering'],
            ],
            [
                'id' => 2,
                'slug' => '5-effective-brain-recharging-activities-no-one-is-talking-about',
                'title' => '5 Effective Brain Recharging Activities No One is Talking About',
                'body' => 'Some long text for body 2',
                'image' => 'https://cdn.sanity.io/images/e4rzjq6v/production/cd477178ed12f28ef668adaf9fcae6b8fc351a08-4480x6415.jpg?rect=0,0,4480,3760&amp;w=3840&amp;q=75&amp;fit=clip&amp;auto=format',
                'srcset' => 'https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=16&amp;q=75&amp;fit=clip&amp;auto=format 16w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=32&amp;q=75&amp;fit=clip&amp;auto=format 32w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=48&amp;q=75&amp;fit=clip&amp;auto=format 48w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=64&amp;q=75&amp;fit=clip&amp;auto=format 64w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=96&amp;q=75&amp;fit=clip&amp;auto=format 96w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=128&amp;q=75&amp;fit=clip&amp;auto=format 128w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=256&amp;q=75&amp;fit=clip&amp;auto=format 256w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=384&amp;q=75&amp;fit=clip&amp;auto=format 384w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=640&amp;q=75&amp;fit=clip&amp;auto=format 640w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=750&amp;q=75&amp;fit=clip&amp;auto=format 750w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=828&amp;q=75&amp;fit=clip&amp;auto=format 828w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=1080&amp;q=75&amp;fit=clip&amp;auto=format 1080w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=1200&amp;q=75&amp;fit=clip&amp;auto=format 1200w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=1920&amp;q=75&amp;fit=clip&amp;auto=format 1920w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=2048&amp;q=75&amp;fit=clip&amp;auto=format 2048w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=3840&amp;q=75&amp;fit=clip&amp;auto=format 3840w',
                'author_name' => 'Ahmed Ali',
                'author_image' => 'https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=3840&amp;q=75&amp;fit=clip&amp;auto=format',
                'author_srcset' => 'https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=16&amp;q=75&amp;fit=clip&amp;auto=format 16w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=32&amp;q=75&amp;fit=clip&amp;auto=format 32w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=48&amp;q=75&amp;fit=clip&amp;auto=format 48w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=64&amp;q=75&amp;fit=clip&amp;auto=format 64w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=96&amp;q=75&amp;fit=clip&amp;auto=format 96w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=128&amp;q=75&amp;fit=clip&amp;auto=format 128w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=256&amp;q=75&amp;fit=clip&amp;auto=format 256w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=384&amp;q=75&amp;fit=clip&amp;auto=format 384w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=640&amp;q=75&amp;fit=clip&amp;auto=format 640w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=750&amp;q=75&amp;fit=clip&amp;auto=format 750w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=828&amp;q=75&amp;fit=clip&amp;auto=format 828w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=1080&amp;q=75&amp;fit=clip&amp;auto=format 1080w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=1200&amp;q=75&amp;fit=clip&amp;auto=format 1200w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=1920&amp;q=75&amp;fit=clip&amp;auto=format 1920w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=2048&amp;q=75&amp;fit=clip&amp;auto=format 2048w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=3840&amp;q=75&amp;fit=clip&amp;auto=format 3840w',
                'published_at' => 'December 31, 2021',
                'tags' => ['Health', 'Wellness'],
            ],
            [
                'id' => 3,
                'slug' => 'how-to-make-your-own-website-in-2021',
                'title' => 'How to make your own website in 2021',
                'body' => 'Some long text for body 3',
                'image' => 'https://images.unsplash.com/photo-1610612010003-8b8b2b2b2b2b?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1050&q=80',
                'srcset' => 'https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=16&amp;q=75&amp;fit=clip&amp;auto=format 16w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=32&amp;q=75&amp;fit=clip&amp;auto=format 32w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=48&amp;q=75&amp;fit=clip&amp;auto=format 48w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=64&amp;q=75&amp;fit=clip&amp;auto=format 64w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=96&amp;q=75&amp;fit=clip&amp;auto=format 96w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=128&amp;q=75&amp;fit=clip&amp;auto=format 128w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=256&amp;q=75&amp;fit=clip&amp;auto=format 256w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=384&amp;q=75&amp;fit=clip&amp;auto=format 384w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=640&amp;q=75&amp;fit=clip&amp;auto=format 640w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=750&amp;q=75&amp;fit=clip&amp;auto=format 750w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=828&amp;q=75&amp;fit=clip&amp;auto=format 828w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=1080&amp;q=75&amp;fit=clip&amp;auto=format 1080w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=1200&amp;q=75&amp;fit=clip&amp;auto=format 1200w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=1920&amp;q=75&amp;fit=clip&amp;auto=format 1920w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=2048&amp;q=75&amp;fit=clip&amp;auto=format 2048w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=3840&amp;q=75&amp;fit=clip&amp;auto=format 3840w',
                'author_name' => 'John Doe',
                'author_image' => 'https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=3840&amp;q=75&amp;fit=clip&amp;auto=format',
                'author_srcset' => 'https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=16&amp;q=75&amp;fit=clip&amp;auto=format 16w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=32&amp;q=75&amp;fit=clip&amp;auto=format 32w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=48&amp;q=75&amp;fit=clip&amp;auto=format 48w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=64&amp;q=75&amp;fit=clip&amp;auto=format 64w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=96&amp;q=75&amp;fit=clip&amp;auto=format 96w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=128&amp;q=75&amp;fit=clip&amp;auto=format 128w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=256&amp;q=75&amp;fit=clip&amp;auto=format 256w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=384&amp;q=75&amp;fit=clip&amp;auto=format 384w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=640&amp;q=75&amp;fit=clip&amp;auto=format 640w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=750&amp;q=75&amp;fit=clip&amp;auto=format 750w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=828&amp;q=75&amp;fit=clip&amp;auto=format 828w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=1080&amp;q=75&amp;fit=clip&amp;auto=format 1080w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=1200&amp;q=75&amp;fit=clip&amp;auto=format 1200w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=1920&amp;q=75&amp;fit=clip&amp;auto=format 1920w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=2048&amp;q=75&amp;fit=clip&amp;auto=format 2048w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=3840&amp;q=75&amp;fit=clip&amp;auto=format 3840w',
                'published_at' => 'October 21, 2022',
                'tags' => ['Technology', 'Programming'],
            ],
            [
                'id' => 4,
                'slug' => 'how-to-make-your-own-website-in-2021',
                'title' => 'How to make your own website in 2021',
                'body' => 'Some long text for body 4',
                'image' => 'https://images.unsplash.com/photo-1610612010003-8b8b2b2b2b2b?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1050&q=80',
                'srcset' => 'https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=16&amp;q=75&amp;fit=clip&amp;auto=format 16w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=32&amp;q=75&amp;fit=clip&amp;auto=format 32w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=48&amp;q=75&amp;fit=clip&amp;auto=format 48w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=64&amp;q=75&amp;fit=clip&amp;auto=format 64w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=96&amp;q=75&amp;fit=clip&amp;auto=format 96w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=128&amp;q=75&amp;fit=clip&amp;auto=format 128w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=256&amp;q=75&amp;fit=clip&amp;auto=format 256w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=384&amp;q=75&amp;fit=clip&amp;auto=format 384w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=640&amp;q=75&amp;fit=clip&amp;auto=format 640w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=750&amp;q=75&amp;fit=clip&amp;auto=format 750w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=828&amp;q=75&amp;fit=clip&amp;auto=format 828w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=1080&amp;q=75&amp;fit=clip&amp;auto=format 1080w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=1200&amp;q=75&amp;fit=clip&amp;auto=format 1200w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=1920&amp;q=75&amp;fit=clip&amp;auto=format 1920w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=2048&amp;q=75&amp;fit=clip&amp;auto=format 2048w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=3840&amp;q=75&amp;fit=clip&amp;auto=format 3840w',
                'author_name' => 'John Doe',
                'author_image' => 'https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=3840&amp;q=75&amp;fit=clip&amp;auto=format',
                'author_srcset' => 'https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=16&amp;q=75&amp;fit=clip&amp;auto=format 16w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=32&amp;q=75&amp;fit=clip&amp;auto=format 32w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=48&amp;q=75&amp;fit=clip&amp;auto=format 48w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=64&amp;q=75&amp;fit=clip&amp;auto=format 64w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=96&amp;q=75&amp;fit=clip&amp;auto=format 96w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=128&amp;q=75&amp;fit=clip&amp;auto=format 128w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=256&amp;q=75&amp;fit=clip&amp;auto=format 256w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=384&amp;q=75&amp;fit=clip&amp;auto=format 384w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=640&amp;q=75&amp;fit=clip&amp;auto=format 640w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=750&amp;q=75&amp;fit=clip&amp;auto=format 750w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=828&amp;q=75&amp;fit=clip&amp;auto=format 828w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=1080&amp;q=75&amp;fit=clip&amp;auto=format 1080w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=1200&amp;q=75&amp;fit=clip&amp;auto=format 1200w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=1920&amp;q=75&amp;fit=clip&amp;auto=format 1920w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=2048&amp;q=75&amp;fit=clip&amp;auto=format 2048w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=3840&amp;q=75&amp;fit=clip&amp;auto=format 3840w',
                'published_at' => 'October 21, 2022',
                'tags' => ['Technology', 'Programming'],
            ],
            [
                'id' => 5,
                'slug' => 'how-to-make-your-own-website-in-2021',
                'title' => 'How to make your own website in 2021',
                'body' => 'Some long text for body 5',
                'image' => 'https://images.unsplash.com/photo-1610612010003-8b8b2b2b2b2b?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1050&q=80',
                'srcset' => 'https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=16&amp;q=75&amp;fit=clip&amp;auto=format 16w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=32&amp;q=75&amp;fit=clip&amp;auto=format 32w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=48&amp;q=75&amp;fit=clip&amp;auto=format 48w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=64&amp;q=75&amp;fit=clip&amp;auto=format 64w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=96&amp;q=75&amp;fit=clip&amp;auto=format 96w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=128&amp;q=75&amp;fit=clip&amp;auto=format 128w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=256&amp;q=75&amp;fit=clip&amp;auto=format 256w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=384&amp;q=75&amp;fit=clip&amp;auto=format 384w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=640&amp;q=75&amp;fit=clip&amp;auto=format 640w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=750&amp;q=75&amp;fit=clip&amp;auto=format 750w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=828&amp;q=75&amp;fit=clip&amp;auto=format 828w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=1080&amp;q=75&amp;fit=clip&amp;auto=format 1080w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=1200&amp;q=75&amp;fit=clip&amp;auto=format 1200w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=1920&amp;q=75&amp;fit=clip&amp;auto=format 1920w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=2048&amp;q=75&amp;fit=clip&amp;auto=format 2048w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=3840&amp;q=75&amp;fit=clip&amp;auto=format 3840w',
                'author_name' => 'John Doe',
                'author_image' => 'https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=3840&amp;q=75&amp;fit=clip&amp;auto=format',
                'author_srcset' => 'https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=16&amp;q=75&amp;fit=clip&amp;auto=format 16w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=32&amp;q=75&amp;fit=clip&amp;auto=format 32w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=48&amp;q=75&amp;fit=clip&amp;auto=format 48w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=64&amp;q=75&amp;fit=clip&amp;auto=format 64w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=96&amp;q=75&amp;fit=clip&amp;auto=format 96w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=128&amp;q=75&amp;fit=clip&amp;auto=format 128w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=256&amp;q=75&amp;fit=clip&amp;auto=format 256w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=384&amp;q=75&amp;fit=clip&amp;auto=format 384w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=640&amp;q=75&amp;fit=clip&amp;auto=format 640w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=750&amp;q=75&amp;fit=clip&amp;auto=format 750w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=828&amp;q=75&amp;fit=clip&amp;auto=format 828w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=1080&amp;q=75&amp;fit=clip&amp;auto=format 1080w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=1200&amp;q=75&amp;fit=clip&amp;auto=format 1200w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=1920&amp;q=75&amp;fit=clip&amp;auto=format 1920w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=2048&amp;q=75&amp;fit=clip&amp;auto=format 2048w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=3840&amp;q=75&amp;fit=clip&amp;auto=format 3840w',
                'published_at' => 'October 21, 2022',
                'tags' => ['Technology', 'Programming'],
            ],
        ]);

        $topPosts = $posts->take(2);
        $posts = $posts->slice(2);


        // $query = $this->post;

        // if ($request->has('q')) {
        //     $query = $query->where('title', 'like', '%' . $request->q . '%');
        // }

        // $posts = $query->with('photos','locations')->paginate(20);
        // $parentCategories = $this->category->whereNull('parent_id')->get();

        $data = [
            'posts' => $posts,
            'top_posts' => $topPosts,
        ];

        return view('pages.home', compact('data'));
    }

    public function test()
    {
        return 'test';
    }
}
