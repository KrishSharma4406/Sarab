<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
 
 

class ProductController extends Controller
{
    public function index() {
        return view('products.main');
    }

    public function create() {
        return view('products.create');
    }

    public function store(Request $request) {
        // Handle product storage logic here
        return view('products.store');
    }
}
