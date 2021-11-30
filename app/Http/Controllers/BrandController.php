<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $allBrands = Brand::withoutTrashed()->latest()->paginate(5, ['*'], 'active-brands');
       $trashBrands = Brand::onlyTrashed()->latest()->paginate(3, ['*'], 'trash-brands');
       return view('admin.brand.index', compact('allBrands', 'trashBrands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
        
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'  => 'required|unique:brands|min:3|max:250',
            'image' => 'required|mimes:png,jpg,jpeg|min:1|max:3072'
        ]);

    
        $imageFile      = $request->file('image');
        $uniqueNameGen  = hexdec(uniqid()).'_'.date('mdyHis');
        $imageExt       = Str::lower($imageFile->getClientOriginalExtension());
        $newImageName   = $uniqueNameGen.'.'.$imageExt;
        $imagePath      = 'image/brand/'.$newImageName;

        Image::make($imageFile)->resize(260, 180)->save($imagePath);

        $brand = new Brand();
        $brand->name    = $request->name;
        $brand->image   = $imagePath;
        $brand->user_id = Auth::user()->id;
        $brand->save();

        return redirect()->back()->with('success', 'Brand created successfully!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($id)
    // {
        
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $brand = Brand::withoutTrashed()->findOrFail($id);
        return view('admin.brand.edit', compact('brand'));
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
        $validated = $request->validate([
            'name'  => 'required|min:3|max:250|unique:brands,name,'.$id,
            'image' => 'mimes:png,jpg,jpeg|min:1|max:3072'
        ]);

        $brand = Brand::withoutTrashed()->findOrFail($id);
        $brand->name = $request->name;

        if($request->hasFile('image')){
            $imageFile      = $request->file('image');
            $uniqueNameGen  = hexdec(uniqid()).'_'.date('mdyHis');
            $imageExt       = Str::lower($imageFile->getClientOriginalExtension());
            $newImageName   = $uniqueNameGen.'.'.$imageExt;
            $imagePath      = 'image/brand/'.$newImageName;
    
            Image::make($imageFile)->resize(260, 180)->save($imagePath);
            unlink($request->old_image);

            $brand->image = $imagePath;
        }

        $brand->user_id = Auth::user()->id;
        $brand->save();

        return redirect()->route('all.brand')->with('success', 'Brand updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function softDestroy($id){
        Brand::withoutTrashed()->findOrFail($id)->delete();

        return redirect()->back()->with('success', 'Brand soft deleted successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        Brand::onlyTrashed()->findOrFail($id)->restore();

        return redirect()->back()->with('success', 'Brand restored successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $brand = Brand::onlyTrashed()->findOrFail($id);
        unlink($brand->image);
        $brand->forceDelete();
        
        return redirect()->back()->with('success', 'Brand permanently deleted successfully!');
    }
}
