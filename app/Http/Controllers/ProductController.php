<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view('Product.product', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //


        $request->validate([
            'name'=> 'required|string|max:20',
            'price' => 'required|integer',
            'description' => 'required|string',
            'image' => 'required',
        ]);

        $path = $request->file('image')->store('products', 'public');


        Product::Create([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'image' => $path
        ]);


        return back();


    }

    public function productGallery(){
        $products = Product::all();
        return view('Product.product_gallery', compact('products'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $path = $product->image;

        $storage = Storage::disk('public');


        if($storage->exists($path)){
            $storage->delete($path);
            $product->delete();
        }

        return back();
    }
}
