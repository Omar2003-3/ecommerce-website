<?php

namespace App\Http\Controllers\userWeb;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class UIProductController extends Controller
{
    public function index(){
        $products = Product::all();
        return view('UI.product', compact('products'));
    }
}
