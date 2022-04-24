<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function addproduct(Request $request)
    {
        $product_id = $request->input('product_id');
        $product_qty = $request->input('product_qty');


            $prod_check = Product::where('id', $product_id)->first();

            if ($prod_check) {
                if (Cart::where('prod_id', $product_id)->where('user_id', Auth::id())->exists()) {
                    return response()->json(['status' => $prod_check->name."This Cart Already Added"]);
                } else {
                    $cartItem = new Cart();
                    $cartItem ->prod_id = $product_id;
                    if (Auth::check()) {
                        $cartItem->user_id = Auth::id();
                    }
                    $cartItem ->session_id = session()->getId();
                    $cartItem ->prod_qty = $product_qty;
                    $cartItem->save();
                    return response()->json(['status' => $prod_check->name." Added To Cart Succsesfully"]);
                }
            }

    }
    public function viewcart()
    {
        $cartitems = Cart::where('user_id',Auth::id())->get();
        return view('frontend.cart', compact('cartitems'));
    }

    public function updateproduct(Request $request)
    {
        $prod_id = $request->input('prod_id');
        $product_qty = $request->input('prod_qty');
        if (Auth::check()) {

            if (Cart::where('prod_id', $prod_id)->where('user_id', Auth::id())->exists()) {
                $cart = Cart::where('prod_id', $prod_id)->where('user_id', Auth::id())->first();
                $cart->prod_qty = $product_qty;
                $cart->update();
                return response()->json(['status' => "Product updated Successfully"]);
            }
        }
    }
    public function deleteproduct(Request $request)
    {
        if (Auth::check()) {
            $prod_id = $request->input('prod_id');
            if(Cart::where('prod_id', $prod_id)->where('user_id', Auth::id())->exists())
            {
                $cartItem = Cart::where('prod_id', $prod_id)->where('user_id', Auth::id())->find();
                $cartItem->delete();
                return response()->json(['status' => "Product Deleted Successfully"]);
            }
        }else{
            return response()->json(['status' => "Login To Continue"]);
        }
    }

    public function cartcount()
    {
        $cartCount = 0;
        $cart = new Cart();
        if(Auth::check())
        {
            $cart->user_id = Auth::id();
        }else{
            $cart->session_id = session()->getId();
        }
        $cartCount = $cart->count();

        return response()->json(['count'=> $cartCount]);
    }


}
