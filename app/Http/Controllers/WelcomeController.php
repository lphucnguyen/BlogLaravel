<?php

namespace App\Http\Controllers;

use App\Category;
use App\Menu;
use App\Post;
use App\Slider;
use App\Tag;
use App\Comment;
use App\Subscriber;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class WelcomeController extends Controller
{
    public function home(){
        $menus = Menu::latest()->get();
        $posts = Post::published()->paginate(5);
        $postsPopular = Post::published()
                        ->orderByRaw('view_count DESC')
                        ->take(3)
                        ->get();
        $sliders = Slider::latest()->published()->get();
        $tags = Tag::latest()->get();
        $categories = Category::latest()->get();

        $currentPage = $posts->toArray()['current_page'];
        $nextPage = $posts->toArray()['next_page_url'];
        $prevPage = $posts->toArray()['prev_page_url'];
        $path = $posts->toArray()['path'];
        if(!$prevPage) $prevPage = 1;
        $lastPage = min($posts->toArray()['last_page'], $currentPage + 2);
        $firstPage = max(1, $currentPage - 2);

        return view('welcome', compact('menus', 'posts', 'sliders', 'tags', 'categories', 'postsPopular', 'currentPage', 'nextPage', 'prevPage', 'lastPage', 'firstPage', 'path'));
    }

    public function post($slug, $id, Request $request){
        $post = Post::published()->where('slug', '=', $slug)
                                ->where('id' , '=', $id)
                                ->firstOrFail();    
        $menus = Menu::latest()->get();
        $blogKey = 'blog_' . $post->id;
        if(!$request->session()->has($blogKey)){
            $post->increment('view_count');
            $request->session()->put($blogKey, 1);
        }
        $categories = Category::latest()->get();
        $postsPopular = Post::published()
                            ->orderByRaw('view_count DESC')
                            ->take(3)
                            ->get();
        $categoryId = $post->category->id;
        $postsRelated = Post::published()->where('category_id', $categoryId)->orderByRaw("RAND()")->take(3)->get();
        return view('frontend.post', compact('post', 'menus', 'postsRelated', 'categories', 'postsPopular'));
    }

    public function category($slug, $id){
        $menus = Menu::latest()->get();
        $category = Category::where('slug', '=', $slug)
                            ->where('id', '=', $id)
                            ->first();
        $categories = Category::latest()->get();
        $postsPopular = Post::published()
                            ->orderByRaw('view_count DESC')
                            ->take(3)
                            ->get();
                            
        $posts = Category::with('post')
                            ->where('slug', '=', $slug)
                            ->where('id', '=', $id)
                            ->paginate(5);

        $currentPage = $posts->toArray()['current_page'];
        $nextPage = $posts->toArray()['next_page_url'];
        $prevPage = $posts->toArray()['prev_page_url'];
        $path = $posts->toArray()['path'];
        $lastPage = min($posts->toArray()['last_page'], $currentPage + 2);
        $firstPage = max(1, $currentPage - 2);
        if(!$prevPage) $prevPage = $path . '?page=' . $firstPage;
        if(!$nextPage) $nextPage = $path . '?page=' . $lastPage;

        return view('frontend.category', compact('menus', 'category', 'categories', 'postsPopular', 'posts', 'currentPage', 'nextPage', 'prevPage', 'lastPage', 'firstPage', 'path'));
    }

    public function tag($id){
        $menus = Menu::latest()->get();
        $tag = Tag::findOrFail($id);
        $categories = Category::latest()->get();
        $postsPopular = Post::published()
                            ->orderByRaw('view_count DESC')
                            ->take(3)
                            ->get();
        $posts = Tag::find($id)->post()->paginate(5);

        $currentPage = $posts->toArray()['current_page'];
        $nextPage = $posts->toArray()['next_page_url'];
        $prevPage = $posts->toArray()['prev_page_url'];
        $path = $posts->toArray()['path'];
        $lastPage = min($posts->toArray()['last_page'], $currentPage + 2);
        $firstPage = max(1, $currentPage - 2);
        if(!$prevPage) $prevPage = $path . '?page=' . $firstPage;
        if(!$nextPage) $nextPage = $path . '?page=' . $lastPage;

        return view('frontend.tag', compact('tag', 'posts', 'categories', 'postsPopular', 'menus', 'currentPage', 'nextPage', 'prevPage', 'lastPage', 'firstPage', 'path'));
    }

    public function comment(Request $request, $id){
        $request->validate([
            'name' => 'required',
            'email' => 'email|required',
            'message' => 'required|max:255'
        ]);

        $comment = new Comment();
        $comment->post_id = $id;
        $comment->name = $request->name;
        $comment->email = $request->email;
        $comment->message = $request->message;
        $comment->save();

        return redirect()->back();
    }

    public function subscriber(Request $request){
        $validate = $request->validate([
            'email' => 'required|email|unique:subscribers'
        ]);

        if(!$validate){
            return back()->with('toast_error', 'Email is subscribed!!!');
        }

        if(!session()->has('subscribe')){
            session()->put('subscribe', 1);
        }

        $subscriber = new Subscriber();
        $subscriber->email = $request->email;
        $subscriber->save();

        return redirect()->back()->withSuccess('Thank you for your subscribe!!!');
    }

    public function search(Request $request){
        $menus = Menu::latest()->get();
        $categories = Category::latest()->get();
        $postsPopular = Post::published()
                            ->orderByRaw('view_count DESC')
                            ->take(3)
                            ->get();

        $posts = Post::where('title', 'LIKE', '%' . $request->search . '%')->paginate(5);
        $slug = $request->search;

        $currentPage = $posts->toArray()['current_page'];
        $nextPage = $posts->toArray()['next_page_url'];
        $prevPage = $posts->toArray()['prev_page_url'];
        $path = $posts->toArray()['path'];
        $lastPage = min($posts->toArray()['last_page'], $currentPage + 2);
        $firstPage = max(1, $currentPage - 2);
        if(!$prevPage) $prevPage = $path . '?page=' . $firstPage;
        if(!$nextPage) $nextPage = $path . '?page=' . $lastPage;

        return view('frontend.search', compact('posts', 'slug', 'categories', 'postsPopular', 'menus', 'currentPage', 'nextPage', 'prevPage', 'lastPage', 'firstPage', 'path'));
    }
}
