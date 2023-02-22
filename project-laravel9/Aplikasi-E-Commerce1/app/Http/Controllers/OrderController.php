<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $is_admin = $user->is_admin;
        if($is_admin){
            
            $orders = Order::all();
        } else {
            $orders = Order::where('user_id', $user->id)->get();
        }
        return view('Ecommerce.order.list_order', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function checkout()
    {
        $user_id = Auth::id();
        $carts = Cart::where('user_id', $user_id)->get();

        if($carts == null) {
            return Redirect::back();
        }

        $order = Order::create([
            'user_id' => $user_id
        ]);

        foreach ($carts as $cart) {

            $product = Product::find($cart->product_id); 

            $product->update([
                'stock' => $product->stock - $cart->amount
            ]);
            
            Transaction::create([
                'amount' => $cart->amount,
                'order_id' => $order->id,
                'product_id' => $cart->product_id
            ]);

            $cart->delete();
        }

        return redirect(route('show_order', $order));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show_order(Order $order)
    {
        $user = Auth::user();
        $is_admin = $user->is_admin;
        if ($is_admin ||$order->user_id == $user->id) {
            
            return view('Ecommerce.order.show_order', compact('order'));
        }

        return redirect(route('list_order'));
    }

    public function sumbit_payment_receipt(Order $order, Request $request)
    {
       $file = $request->file('payment_receipt');
       $path = time() . '_' . $order->id . '.' . $file->getClientOriginalExtension();
        
        Storage::disk('local')->put('public/'. $path, file_get_contents($file));

       $order->update([
        'payment_receipt' => $path
       ]);

       return redirect(route('list_order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function confirm_payment(Order $order)
    {
        $order->update([
            'is_paid' => true
        ]);
        
        return Redirect::back();

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}