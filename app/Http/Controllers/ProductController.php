<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Auth;

class ProductController extends Controller
{

    public function index()
    {
//        $products = Product::first()->simplePaginate(25);
        $products = Product::first()->paginate(15);
        $categories = Category::all(['id','name']);
        return view('product.index', compact('products', 'categories'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'name' => 'required|unique:products|max:255',
            'category' =>'required',
        ],
            [
                'name.required' => 'Please Input Product Name',
                'name.max' => 'Category Less than 255 chars',
            ]);


        $product = new Product;
        $product->user_id = Auth::user()->id;
        $product->category_id = $request->category;
        $product->name = $request->name;
        $product->save();

        return Redirect()->back()->with('success','Product Inserted Successfully');
    }

    public function show(Product $product)
    {
        //
    }

    public function edit(Product $product)
    {
        //
    }

    public function update(Request $request, Product $product)
    {
        //
    }

    public function destroy(Product $product)
    {
        //
    }
}
