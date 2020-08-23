<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Slider;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::paginate(10);
        $lastPageUrl = $sliders->toArray()['last_page_url'];
        $firstPageUrl  = $sliders->toArray()['first_page_url'];
        $currentPage = $sliders->toArray()['current_page'];
        $lastPage = $sliders->toArray()['last_page'];
        $path = $sliders->toArray()['path'];

        return view('admin.slider.index',compact('sliders', 'path','lastPage','lastPageUrl', 'firstPageUrl', 'currentPage'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.slider.create');
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
            'title' => 'required|min:5',
            'image' => 'mimes:jpeg,jpg,png,gif|image|required|max:5000',
            'published' => 'required'
        ]);

        if(!$request->link){
            $request->link = '#';
        }

        $image = $request->file('image');

        if(!Storage::disk('public')->exists('slider')){
            Storage::disk('public')->makeDirectory('slider');
        }


        $imageName =  'slider-' . uniqid() . '.' . $image->getClientOriginalExtension();

        // $image->storePubliclyAs( 'slider', $imageName, 'public');
        Storage::disk('public')->put('slider/' . $imageName, file_get_contents($image));

        $slider = new Slider();
        $slider->title = $request->title;
        $slider->link = $request->link;
        $slider->published = $request->published;
        $slider->image = $imageName;
        $slider->save();

        return redirect()->route('slider.index');
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
        $sliderEdit = Slider::findOrFail($id);
        $imageUrl = Storage::disk('public')->url('slider/' . $sliderEdit->image);
        return view('admin.slider.edit', compact('sliderEdit', 'imageUrl'));
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
            'title' => 'required|min:5',
            'image' => 'mimes:jpeg,jpg,png,gif|image|max:5000',
            'published' => 'required'
        ]);

        $slider = Slider::findOrFail($id);

        if(!$request->link){
            $request->link = '#';
        }

        $imageName = $slider->image;

        if($request->hasFile('image')){
            if(Storage::disk('public')->exists('slider')){
                Storage::disk('public')->delete('slider/' . $imageName);
            }
            $image = $request->file('image');
            $imageName = 'slider-' . uniqid() . '.' . $image->getClientOriginalExtension();
            // $image->storeAs('slider', $imageName, 'public');
            Storage::disk('public')->put('slider/' . $imageName, file_get_contents($image));
        }


        $slider->title = $request->title;
        $slider->link = $request->link;
        $slider->image = $imageName;
        $slider->published = $request->published;
        $slider->save();

        return redirect()->route('slider.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slider = Slider::findOrFail($id);
        $slider->delete();
        return redirect()->route('slider.index');
    }

    public function published($id){
        $slider = Slider::findOrFail($id);
        $slider->published = !$slider->published;
        $slider->save();
        return redirect()->route('slider.index');
    }
}
