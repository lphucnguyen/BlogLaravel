<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use App\Post;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::paginate(10);
        $lastPageUrl = $categories->toArray()['last_page_url'];
        $firstPageUrl  = $categories->toArray()['first_page_url'];
        $currentPage = $categories->toArray()['current_page'];
        $lastPage = $categories->toArray()['last_page'];
        $path = $categories->toArray()['path'];
        return view('admin.category.index', compact('categories', 'path','lastPage','lastPageUrl', 'firstPageUrl', 'currentPage'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
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
            'categoryName' => 'required|unique:categories'
        ]);
        $category = new Category();
        $category->categoryName = $request->categoryName;
        $category->slug = Str::slug($request->categoryName);
        $category->created_at = Carbon::now()->toDateString();
        $category->save();
        return redirect()->route('category.index');
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
        $categoryEdit = Category::findOrFail($id);
        return view('admin.category.edit', compact('categoryEdit'));
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
            'categoryName' => 'required'
        ]);
        $category = Category::findOrFail($id);
        
        if($category->slug != Str::slug($request->categoryName)){
            $categoryIsExist = Category::where('slug', '=', Str::slug($request->categoryName))->get();
            if(count($categoryIsExist->toArray()) == 1){
                return redirect()->back()->withErrors('Title is exist!!!');
            }
        }

        $category->categoryName = $request->categoryName;
        $category->slug = Str::slug($request->categoryName);
        $category->save();
        return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categoryDelete = Category::findOrFail($id);

        $postOfCategory = Post::where('category_id', '=', $id)->get()->toArray();
        if(count($postOfCategory) > 0){
            return redirect()->back()->withErrors('There are many posts of category');
        }

        $categoryDelete->delete();
        return redirect()->route('category.index');
    }

    public function published($id){
        $category = Category::findOrFail($id);
        $category->published = !$category->published;
        $category->save();
        return redirect()->route('category.index');
    }
}
