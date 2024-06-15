<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $result = Category::orderBy('id', 'desc')->paginate(5);
        // dd($result->toArray());
        return view('category.index', compact('result'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'category'=>['required', 'unique:categories,category_name']
        ]);
        Category::create(['category_name'=> $request->category]);
        return redirect()->to('categories')->with('success', 'Category Added');
    }

    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $category)
    {
        $request->validate([
            'category'=>['required', 'unique:categories,category_name,'.$category]
        ]);
        $category_details = Category::find($category);
        $category_details->category_name = $request->category;
        $category_details->save();
        return redirect()->to('categories')->with('success', 'Category Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();
    }
}
