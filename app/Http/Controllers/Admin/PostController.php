<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Post;
use App\Category;
use App\Subscriber;
use App\Tag;

use Illuminate\Support\Facades\Notification;
use App\Notifications\SubscriberPost;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = DB::table('posts')
                ->join('categories', 'posts.category_id', '=', 'categories.id')
                ->select('posts.*', 'categories.categoryName')
                ->paginate(10);
        $lastPageUrl = $posts->toArray()['last_page_url'];
        $firstPageUrl  = $posts->toArray()['first_page_url'];
        $currentPage = $posts->toArray()['current_page'];
        $lastPage = $posts->toArray()['last_page'];
        $path = $posts->toArray()['path'];
        return view('admin.post.index', compact( 'posts', 'lastPageUrl', 'firstPageUrl', 'currentPage', 'lastPage', 'path'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::latest()->get();
        $tags = Tag::latest()->get();
        return view('admin.post.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255|unique:posts',
            'category_id' => 'required',
            'published' => 'required',
            'content' => 'required|min:10',
            'image' => 'mimes:jpeg,jpg,png,gif|required|max:5000',
            'shortDescription' => 'required|max:255|min:5'
        ]);
        
        $image = $request->file('image');
        $slug = Str::slug($request->title);

        if(!Storage::disk('public')->exists('post')){
            Storage::disk('public')->makeDirectory('post');
        }

        $imageName = $slug . '-' . uniqid() . '.' . $image->getClientOriginalExtension();

        $image->storeAs( 'post', $imageName, 'public');

        $post = new Post();
        $post->title = $request->title;
        $post->slug = $slug;
        $post->category_id = $request->category_id;
        $post->published = $request->published;
        $post->content = $request->content;
        $post->image = $imageName;
        $post->shortDescription = $request->shortDescription;
        $post->save();

        if($request->tags_id){
            foreach($request->tags_id as $tag_id){
                $post->tag()->attach($tag_id);
            }
        }

        $subscribers = Subscriber::all();
        foreach($subscribers as $subscriber){
            Notification::route('mail', $subscriber->email)
                            ->notify(new SubscriberPost($post));
        }
        
        return redirect()->route('post.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $postEdit = Post::findOrFail($id);
        $categories = Category::latest()->get();
        $imageUrl = Storage::disk('public')->url('post/' . $postEdit->image);
        $tags = Tag::latest()->get();
        $tagsEdit = $postEdit->tag()->pluck('tag_id')->toArray();
        return view('admin.post.edit', compact('postEdit', 'categories', 'imageUrl', 'tags', 'tagsEdit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|max:255',
            'category_id' => 'required',
            'published' => 'required',
            'content' => 'required|min:10',
            'shortDescription' => 'required|max:255|min:5'
        ]);
        
        $post = Post::findOrFail($id);
        if($post->slug != Str::slug($request->title)){
            $postIsExist = Post::where('slug', '=', Str::slug($request->title))->get();
            if(count($postIsExist->toArray()) == 1){
                return redirect()->back()->withErrors('Title is exist!!!');
            }
        }
        
        $slug = Str::slug($request->title);

        if(!Storage::disk('public')->exists('post')){
            Storage::disk('public')->makeDirectory('post');
        }

        $imageName = $post->image;

        if($request->hasFile('image')){
            if(Storage::disk('public')->exists('post')){
                Storage::disk('public')->delete('post/' . $imageName);
            }
            $image = $request->file('image');
            $imageName = $slug . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('post', $imageName, 'public');
        }
        
        $post->title = $request->title;
        $post->slug = $slug;
        $post->category_id = $request->category_id;
        $post->published = $request->published;
        $post->content = $request->content;
        $post->image = $imageName;
        $post->shortDescription = $request->shortDescription;
        $post->save();


        if($request->tags_id){
            $post->tag()->sync($request->tags_id);
        }

        return redirect()->route('post.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $imageName = $post->image;
        if(Storage::disk('public')->exists('post')){
            Storage::disk('public')->delete('post/' . $imageName);
        }
        $post->delete();
        $post->tag()->detach();
        
        return redirect()->route('post.index');
    }

    public function published($id)
    {
        $post = Post::findOrFail($id);
        $post->published = !$post->published;
        $post->save();
        return redirect()->route('post.index');
    }
}
