<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function add_to_cart(Product $product, Request $request)
    {
        $user_id = Auth::id();
        $product_id = $product->id;

        $exiciting_cart = Cart::where('product_id', $product_id)
            ->where('user_id', $user_id)->first();

        if ($exiciting_cart == null) {
            
            $request->validate([
                'amount' => 'required|gte:1|lte:' . $product->stock

            ]);

            Cart::create([
                'user_id' => $user_id,
                'product_id' => $product_id,
                'amount' => $request->amount,
            ]);
        } else {
             
            $request->validate([
                'amount' => 'required|gte:1|lte:' . ($product->stock - $exiciting_cart->amount)

            ]);
            
            $exiciting_cart->update([
                'amount' => $exiciting_cart->amount + $request->amount
            ]);
        }

        return redirect(route('show_cart'))->with('success', 'Add to Cart succees !!');
    }

    public function show_cart()
    {
        $user_id = Auth::id();
        $carts = Cart::where('user_id', $user_id)->get();

        return view('Ecommerce.cart.detail_carts', compact('carts'));
    }

    public function update_cart(Cart $cart, Request $request)
    {
        $request->validate([
            'amount' => 'required|gte:1|lte:' . $cart->product->stock
        ]);

        $cart->update([
            'amount' => $request->amount
        ]);

        return redirect(route('show_cart'))->with('success', 'Update cart success!!');
    }

    public function delete_cart(Cart $cart)
    {
        $cart->delete();
        return redirect(route('show_cart'))->with('success', 'Delete cart success!!');
    }
}