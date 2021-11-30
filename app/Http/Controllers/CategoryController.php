<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allCategories     = Category::withoutTrashed()->latest()->paginate(5, ['*'], 'active-cats');
        $trashedCategories = Category::onlyTrashed()->latest()->paginate(3, ['*'], 'trash-cats');
        // $allCategories = DB::table('categories')
        //                 ->join('users', 'users.id', 'categories.user_id')
        //                 ->select('categories.*', 'users.name as username')
        //                 ->latest()->paginate(5);
        return view('admin.category.index', compact('allCategories', 'trashedCategories'));
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
        //'name' => 'required|unique:categories,deleted_at,NULL|min:3|max:200'
        $validated = $request->validate([
            'name' => 'required|unique:categories|min:3|max:200',
        ]);

        $category = new Category();
        $category->name    = $request->name;
        $category->user_id = Auth::user()->id;
        $category->save();

        return redirect()->back()->with('success', 'Category created successfully!');
        
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
        $category = Category::withoutTrashed()->findOrFail($id);
        return view('admin.category.edit', compact('category'));
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
        $category = Category::withoutTrashed()->findOrFail($id);
        $validated = $request->validate([
            'name' => 'required|unique:categories|min:3|max:200',
        ]);

        $category->name    = $request->name;
        $category->user_id = Auth::user()->id;
        $category->save();

        return redirect()->route('all.cat')->with('success', 'Category updated successfully!');
    }

        /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function softDestroy($id)
    {
        Category::withoutTrashed()->findOrFail($id)->delete();
        
        return redirect()->back()->with('success', 'Category soft deleted successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        Category::onlyTrashed()->findOrFail($id)->restore();

        return redirect()->back()->with('success', 'Category restored successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::onlyTrashed()->findOrFail($id)->forceDelete();

        return redirect()->back()->with('success', 'Category permanently deleted successfully!');
    }
}
