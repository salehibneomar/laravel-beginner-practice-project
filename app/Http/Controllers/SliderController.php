<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Auth;


class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::latest()->paginate(5, ['*'], 'slider');
        return view('admin.slider.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
                'title' => 'required|unique:sliders|min:3|max:250',
                'description' => 'nullable|max:1000',
                'image' => 'required|mimes:png,jpg,jpeg|min:1|max:3072',
        ]);

        $imageFile      = $request->file('image');
        $uniqueNameGen  = hexdec(uniqid()).'_'.date('mdyHis');
        $imageExt       = Str::lower($imageFile->getClientOriginalExtension());
        $newImageName   = $uniqueNameGen.'.'.$imageExt;
        $imagePath      = 'image/slider/'.$newImageName;

        $slider = new Slider();
        $slider->title = $request->title;
        $slider->description = $request->description;
        $slider->image = $imagePath;
        $slider->user_id = Auth::user()->id;

        $result = $slider->save();

        if($result){
            Image::make($imageFile)->resize(1920, 1088)->save($imagePath);
        }

        return redirect()->back()->with('success', 'Slider created successfully!');
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
        $slider = Slider::findOrFail($id);
        return view('admin.slider.edit', compact('slider'));
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
        $slider = Slider::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|min:3|max:250|unique:sliders,title,'.$id,
            'description' => 'nullable|max:1000',
            'image' => 'mimes:png,jpg,jpeg|min:1|max:3072',
        ]);

        $slider->title = $request->title;
        $slider->description = $request->description;

        if($request->hasFile('image')){
            $imageFile      = $request->file('image');
            $uniqueNameGen  = hexdec(uniqid()).'_'.date('mdyHis');
            $imageExt       = Str::lower($imageFile->getClientOriginalExtension());
            $newImageName   = $uniqueNameGen.'.'.$imageExt;
            $imagePath      = 'image/slider/'.$newImageName;
    
            Image::make($imageFile)->resize(1920, 1088)->save($imagePath);
            unlink($slider->image);

            $slider->image = $imagePath;
        }

        $slider->user_id = Auth::user()->id;
        $slider->save();

        return redirect()->route('all.slider')->with('success', 'Slider updated successfully!');

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

        unlink($slider->image);
        $slider->delete();
        
        return redirect()->back()->with('success', 'Slider permanently deleted successfully!');
    }
}
