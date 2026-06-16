<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Products;
use App\Models\Banner;
use App\Models\Menu;
use App\Models\Contacts;

class HomePageController extends Controller
{
    public function index()
    {
        $products = Products::all();

        $banner = Banner::first();

        $menus = Menu::where('status',1)
                    ->orderBy('position')
                    ->get();

        $contact = Contacts::first();

        return view('frontend.index', compact(
            'products',
            'banner',
            'menus',
            'contact'
        ));
    }
}