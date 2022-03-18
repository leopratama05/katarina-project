<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\UserCart;
use Auth;
use Illuminate\Http\Request;

class UserCartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $cart = UserCart::all();
        $products = Product::all();
        $total_belanja = UserCart::sum('subTotal');
        return view('cart.index', compact('products', 'cart', 'total_belanja'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $this->validate($request, [
            'product_id' => 'required',
            'quantity' => 'required',

        ]);

        // $product_cek = UserCart::where('product_id', $request->product_id)->first();
        $product = Product::where('id', $request->product_id)->first();
        if ($request->input('quantity') > $product->quantity) {
            //apa bila stok di product tidak cukup
            return redirect()->back()->with('gagal','Stock Product anda tidak cukup');
        } else {
        $cart = UserCart::where('product_id', $request->product_id)->first();
            $cart->product_id = $request->product_id;
            $cart->quantity += $request->quantity;
        }
        $cart->user_id = Auth::user()->id;
        $cart->subTotal = $cart->quantity * $product->price;
        //update stock pada table product
        $product_stock = Product::where('id', $request->product_id)->first();
        $product_stock->quantity -= $request->quantity;
        $product_stock->save();


        if (!$cart->save()) {
            return redirect()->back()->with('error', 'Gagal menambahkan ke keranjang');
        } else {
            return redirect()->back()->with('success', 'Berhasil menambahkan ke keranjang');
        }
        // return redirect()->back()->with('success', 'Product added to cart successfully!');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserCart  $userCart
     * @return \Illuminate\Http\Response
     */
    public function show(UserCart $userCart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserCart  $userCart
     * @return \Illuminate\Http\Response
     */
    public function edit(UserCart $userCart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UserCart  $userCart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserCart $userCart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserCart  $userCart
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cart = UserCart::findOrFail($id);
        //update stock jika dihapus dari keranjang
        $product_stock = Product::where('id', $cart->product_id)->first();
        $product_stock->quantity += $cart->quantity;
        $product_stock->save();
        $cart->delete();
        return redirect()->back()->with('success', 'Product removed from cart successfully!');
    }
}
