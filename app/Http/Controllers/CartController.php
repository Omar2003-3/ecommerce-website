<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    // Show the user's cart
    public function index()
    {
        $cartItems = Cart::where('user_id', Auth::id())->with('product')->get();
        return view('cart.index', compact('cartItems'));
    }

    // Add a product to the cart
    public function add(Request $request, $productId)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);
        $cartItem = Cart::where('user_id', Auth::id())
            ->where('product_id', $productId)
            ->first();
        if ($cartItem) {
            $cartItem->quantity += $request->quantity;
            $cartItem->save();
        } else {
            Cart::create([
                'user_id' => Auth::id(),
                'product_id' => $productId,
                'quantity' => $request->quantity,
            ]);
        }
        return redirect()->route('cart.index')->with('success', 'Product added to cart!');
    }

    // Remove an item from the cart
    public function remove($id)
    {
        $cartItem = Cart::where('user_id', Auth::id())->where('id', $id)->firstOrFail();
        $cartItem->delete();
        return redirect()->route('cart.index')->with('success', 'Item removed from cart!');
    }
}
