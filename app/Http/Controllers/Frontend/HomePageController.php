<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Products;
use App\Models\Banner;
use App\Models\Menu;
use App\Models\Contacts;
use App\Models\HeroSection;
use App\Models\Category;
use App\Models\Marquee;
use App\Models\AboutSection;

class HomePageController extends Controller
{
    public function index()
{
    $hero = HeroSection::first();

    $products = Products::all();

    $banner = Banner::first();

    $categories = Category::withCount('products')
                    ->where('is_active', 1)
                    ->orderBy('name')
                    ->get();

    $menus = Menu::where('status',1)
                ->orderBy('position')
                ->get();

    $contacts = Contacts::first();

    $marquees = Marquee::where('status',1)->get();

    $about = AboutSection::first();

    return view('frontend.index', compact(
        'hero',
        'products',
        'banner',
        'categories',
        'menus',
        'contacts',
        'marquees',
        'about'
    ));
}
}