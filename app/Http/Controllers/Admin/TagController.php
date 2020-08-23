<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Tag;
use App\Post;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::latest()->paginate(10);
        $lastPageUrl = $tags->toArray()['last_page_url'];
        $firstPageUrl  = $tags->toArray()['first_page_url'];
        $currentPage = $tags->toArray()['current_page'];
        $lastPage = $tags->toArray()['last_page'];
        $path = $tags->toArray()['path'];
        return view('admin.tag.index', compact( 'tags', 'lastPageUrl', 'firstPageUrl', 'currentPage', 'lastPage', 'path'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tag.create');
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
            'tagName' => 'required|unique:tags'
        ]);

        $tag = new Tag();
        $tag->tagName = $request->tagName;
        $tag->slug = Str::slug($request->tagName);
        $tag->save();
        return redirect()->route('tag.index');
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
        $tag = Tag::findOrFail($id);
        return view('admin.tag.edit', compact('tag'));
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
            'tagName' => 'required'
        ]);

        $tag = Tag::findOrFail($id);
        $tag->tagName = $request->tagName;
        $tag->save();
        return redirect()->route('tag.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tag = Tag::findOrFail($id);
        $post = new Post();
        $post->tag()->detach($id);
        $tag->delete();
        return redirect()->route('tag.index');
    }
}
