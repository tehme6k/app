<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Auth;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::latest()->paginate(10);
        return view('category.index', compact('categories'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:categories|max:255',
            // 'sub_category_name' => 'required|unique:sub_categories|max:255',
        ],
            [
                'name.required' => 'Please Input Category Name',
                'name.max' => 'Category Less than 255 chars',
            ]);


        $category = new Category;
        $category->name = $request->name;
        $category->user_id = Auth::user()->id;
        $category->save();

        // $subCategory = new SubCategory;
        // $subCategory->name = $request->sub_category_name;
        // $subCategory->user_id = Auth::user()->id;
        // $subCategory->save();

        return Redirect()->back()->with('success','Category Inserted Successfully');

    }

    public function show(Category $category)
    {
        //
    }

    public function edit(Category $category)
    {
        //
    }

    public function update(Request $request, Category $category)
    {
        //
    }

    public function destroy(Category $category)
    {
        //
    }
}
