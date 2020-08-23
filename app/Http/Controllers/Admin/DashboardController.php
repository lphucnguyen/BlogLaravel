<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use App\Post;
use App\Tag;
use App\Comment;

class DashboardController extends Controller
{
    public function index(){
        $totalCategory = Category::count();
        $totalPost = Post::count();
        $totalTag = Tag::count();
        $totalComment = Comment::count();
        return view("admin", compact('totalCategory', 'totalPost', 'totalTag', 'totalComment'));
    }
}
