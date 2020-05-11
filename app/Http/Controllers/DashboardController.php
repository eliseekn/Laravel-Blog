<?php
namespace App\Http\Controllers;

use App\Comments;
use App\Http\Controllers\Controller;
use App\Posts;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function posts()
    {
        if (!Auth::check()) {
            return redirect()->route('user');
        }

        return view(
            'dashboard/posts',
            array(
                'page_title' => 'The Mount Everest Blog - Dashboard | Posts',
				'page_description' => 'Posts administration dashboard',
                'posts' => Posts::paginate(3)
            )
        );
    }

    public function comments()
    {
        if (!Auth::check()) {
            return redirect()->route('user');
        }
        
        return view(
            'dashboard/comments',
            array(
                'page_title' => 'The Mount Everest Blog - Dashboard | Comments',
				'page_description' => 'Comments administration dashboard',
                'comments' => Comments::paginate(3)
            )
        );
    }
}