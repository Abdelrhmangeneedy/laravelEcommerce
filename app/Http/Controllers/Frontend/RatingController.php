<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RatingController extends Controller
{
    public function add(Request $request)
    {
        $stars_rated = $request->input('product_rating');
        $product_id = $request->input('product_id');

        $product_check = Product::where('id', $product_id)->where('status', false)->first();
        if ($product_check) {
            $verified_purchase = Order::where('orders.user_id', Auth::id())
            ->join('order_items', 'orders.id', 'order_items.orders_id')
            ->where('order_items.prod_id', $product_id)->get();

            if ($verified_purchase->count() > 0)
             {
                $existing_rating = Rating::where('user_id', Auth::id())->where('prod_id', $product_id)->first();
                if ($existing_rating){

                    $existing_rating->stars_rated = $stars_rated;
                    $existing_rating->update();

                }else {
                    Rating::create([
                        'user_id' =>Auth::id(),
                        'prod_id' =>$product_id,
                        'stars_rated' =>$stars_rated
                    ]);
                }

                  return redirect()->back()->with('status', "Thanks You For The Rate ");
            }

                return redirect()->back()->with('status', "You cannot rate a product without purchase");

        }
            return redirect()->back()->with('status', "the link you followed was broken");

    }
}
