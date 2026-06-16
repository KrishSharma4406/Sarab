<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use GuzzleHttp\Promise\Create;
use Illuminate\Support\Facades\Validator;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $products = Products::all();

    return view('products.main', compact('products'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'sku' => 'required|unique:products,sku',
            'price' => 'required|numeric',
            'discount_price'=> 'numeric|nullable',
            'status' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,|max:2048',
            'description' => 'string|nullable',
        ]);

        if ($validator->fails()) {
            return redirect(route('products.create'))
                ->withErrors($validator)
                ->withInput();
        }
    $product = new Products();
    $product->name = $request->input('name');
    $product->sku = $request->input('sku');
    $product->price = $request->input('price');
    $product->status = $request->input('status');
    $product->save();

    if($request->hasFile('image')) {
        $image = $request->image;
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('UI/img/products'), $imageName);
        $product->image = $imageName;
        $product->save();
    }

    return redirect()->route('products.main')->with('success', 'Product created successfully');
    }


    /**
     * Display the specified resource.
     */
    public function show(Products $products)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
        public function edit($id)
    {
    $product = Products::findOrFail($id);

    return view('products.edit', compact('product'));

    }
    
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    $product = Products::findOrFail($id);

    $product->update([
        'name' => $request->name,
        'sku' => $request->sku,
        'price' => $request->price,
        'status' => $request->status,
    ]);

    return redirect()
            ->route('products.main')
            ->with('success', 'Product updated successfully');
}

    /**
     * Remove the specified resource from storage.
     */
   public function destroy($id)
{
    $product = Products::findOrFail($id);

    $product->delete();

    return redirect()
            ->route('products.main')
            ->with('success', 'Product deleted successfully');
}
}
