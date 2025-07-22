<?php

namespace App\Http\Controllers\userWeb;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class WebController extends Controller
{
    public function view(){
        $products = Product::all();
        return view('UI.index', compact('products'));
    }
}
