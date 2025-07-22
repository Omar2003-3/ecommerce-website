<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
class CategoryController extends Controller
{
    public function view()
    {
        return view('dashboard.category'); // asm el folder we b3deen n22 el file name
    }
    public function storeCategory()
    {
        request()->validate([
            "name"=>'required',
        
        ],
        [
            'name.required'=>'failed to validate msg',
        ]);
        Category::create(["name" => request('name')]);
        return redirect()->route('category.view')->with('success', 'Category created successfully');
    }
    public function show(){
        $categories = Category::all();
        return view('dashboard.categoryList',compact('categories'));
    }

    public function edit($id){
        $category = Category::findOrFail($id);
        return view('dashboard.editCategory',compact('category'));
    }

    public function update($id){
        $category=Category::findorFail($id);
        $category->update(['name'=>request('name')]);
        return redirect()->route('category.show')->with('success', 'Category updated successfully');
    }

    public function destroy($id){
        $category=Category::findOrFail($id);
        $category->delete();
        return redirect()->route('category.show')->with('success','Category deleted successfully');
    }
}
