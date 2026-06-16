<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contacts;
use App\Models\Frontend;
use App\Models\Menu;
use App\Models\Banner;
use App\Models\Products;
class HomePageController extends Controller
{
    public function index(Request $request)
{
    $user = Frontend::first();

    $menus = Menu::where('status',1)
                ->orderBy('position')
                ->get();
$banner = Banner::where('status',1)->first();

    $products = Products::get();
    $banner = Banner::first();
    $menus = Menu::where('status',1)->orderBy('position')->get();
    $contact = Contacts::first();

    return view('frontend.index', compact(
        'products',
        'banner',
        'menus',
        'contact'
    ));
}
}