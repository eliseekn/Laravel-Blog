<?php

namespace App\Http\Controllers;

use App\Posts;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        return view('home', [
            'page_title' => 'The Mount Everest Blog',
            'page_description' => 'Blog about mountaineering',
            'posts' => Posts::paginate(5)
        ]);
    }
}
