<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Slider;
use Illuminate\Http\Request;

class FrontendController extends Controller
{

    public function brands(){
        $brands = Brand::select('name', 'image')->withoutTrashed()->latest()->get();

        return $brands;
    }

    public function sliders(){
        $sliders = Slider::select('title', 'image', 'description')->latest()->limit(3)->get();

        return $sliders;
    }

    public function about(){
        $about = About::select('title', 'description')->latest()->first();
        return $about;
    }

    public function categories(){
        $categories = Category::withoutTrashed()->latest()->get();
        return $categories;
    }

    public function index(){
        $brands  = $this->brands();
        $sliders = $this->sliders();
        $about   = $this->about();
        $categories = $this->categories();
        $title   = 'Home';
        return view('index', compact('brands', 'sliders', 'about', 'categories', 'title'));
    }

    public function brandPage(){
        $brands  = $this->brands();
        $title   = 'Brand';
        $categories = $this->categories();
        return view('pages.brand', compact('brands', 'title', 'categories'));
    }


}