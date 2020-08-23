<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = Menu::latest()->paginate(10);
        $lastPageUrl = $menus->toArray()['last_page_url'];
        $firstPageUrl  = $menus->toArray()['first_page_url'];
        $currentPage = $menus->toArray()['current_page'];
        $lastPage = $menus->toArray()['last_page'];
        $path = $menus->toArray()['path'];
        return view('admin.menu.index',  compact( 'menus', 'lastPageUrl', 'firstPageUrl', 'currentPage', 'lastPage', 'path'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.menu.create');
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
            'title' => 'required|min:1|max:200',
            'link' => 'max:255'
        ]);

        $menu = new Menu();
        $menu->title = $request->title;
        $menu->link = $request->link;
        $menu->slug = Str::slug($request->title);
        $menu->created_at = Carbon::now()->toDateString();
        $menu->save();
            
        return redirect()->route('menu.index');
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
        $menu = Menu::findOrFail($id);

        return view('admin.menu.edit', compact('menu'));
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
            'title' => 'required|min:1|max:200',
            'link' => 'max:255'
        ]);

        $menu = Menu::findOrFail($id);
        $menu->title = $request->title;
        $menu->link = $request->link;
        $menu->slug = Str::slug($request->title);
        $menu->save();
            
        return redirect()->route('menu.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $menu = Menu::findOrFail($id);
        $menu->delete();

        return redirect()->route('menu.index');
    }
}
