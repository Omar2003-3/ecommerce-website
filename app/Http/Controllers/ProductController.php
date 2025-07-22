<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function view()
    {
        $categories = Category::all();
        return view('dashboard.product', compact('categories'));
    }

    public function storeProduct()
    {
        request()->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:0',
            'category_id' => 'required|exists:categories,id',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        

        $imagePath = null;
        if (request()->hasFile('image')) {
            $image = request()->file('image');
            $imagePath = $image->store('products', 'public');
        }
        $data = [
            'name' => request('name'),
            'price' => request('price'),
            'quantity' => request('quantity'),
            'category_id' => request('category_id'),
            'description' => request('description'),
            'image' => $imagePath,
        ];

        Product::create($data);
        return redirect()->route('product.view')->with('success', 'Product created successfully');
    }

    public function show()
    {
        $products = Product::all();
        return view('dashboard.productList', compact('products'));
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        return view('dashboard.editProduct', compact('product', 'categories'));
    }

    public function update($id)
    {
        request()->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:0',
            'category_id' => 'required|exists:categories,id',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $product = Product::findOrFail($id);
        
        $data = [
            'name' => request('name'),
            'price' => request('price'),
            'quantity' => request('quantity'),
            'category_id' => request('category_id'),
            'description' => request('description'),
        ];
        $imagePath = null;
        // Handle image upload
        if (request()->hasFile('image')) {
            // Delete old image if exists
            if ($product->image && \Storage::exists('public/' . $product->image)) {
                \Storage::delete('public/' . $product->image);
            }
            
            $image = request()->file('image');
            $imagePath = $image->store('products', 'public');
        }

        $product->update($imagePath);
        return redirect()->route('product.show')->with('success', 'Product updated successfully');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route('product.show')->with('success', 'Product deleted successfully');
    }
}
