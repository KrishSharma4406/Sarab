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
use App\Models\OfferSection;
use App\Models\FoodShowcase;
use App\Models\Journey;
use App\Models\Chef;
use App\Models\OpeningSection;
use App\Models\Feedback;
use App\Models\Blog;

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

    $offer = OfferSection::where('status',1)->first();

    $foodShowcase = FoodShowcase::first();

    $journeys = Journey::where('status', 1)->orderBy('position')->get();

    $chefs = Chef::where('status', 1)->orderBy('experience', 'desc')->get();

    $openingHours = OpeningSection::orderBy('id')->get();

    $feedbacks = Feedback::where('status', 1)->get();

    $blogs = Blog::latest()->where('status',1)->take(3)->get();

    return view('frontend.index', compact(
        'hero',
        'products',
        'banner',
        'categories',
        'menus',
        'contacts',
        'marquees',
        'about',
        'offer',
        'foodShowcase',
        'journeys',
        'chefs',
        'openingHours',
        'feedbacks',
        'blogs'
    ));
}
}