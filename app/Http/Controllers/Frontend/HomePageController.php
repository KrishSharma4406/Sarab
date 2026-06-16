<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Frontend;
use App\Models\Menu;
use App\Models\Banner;
class HomePageController extends Controller
{
    public function index(Request $request)
{
    $user = Frontend::first();

    $menus = Menu::where('status',1)
                ->orderBy('position')
                ->get();
$banner = Banner::where('status',1)->first();
 
    return view(
        'frontend.index',
        compact('user','menus', 'banner')
    );
}
}