<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\order_products;
use App\Models\orders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrdersController extends Controller
{
    //

    public function order_chach_delevery(Request $request){

        $user_id = Auth::user()->id;
        $cards_products = Card::where('user_id', $user_id)->get();
    
        $order = new orders(); // Assuming your model is named "Order" instead of "orders"
        $order->user_id = $user_id;
        $order->total = $request->total;
        $order->save(); // Save the order before adding products
    
        foreach ($cards_products as $cards_product) {
            $order_products = new order_products(); // Assuming your model is named "OrderProduct" instead of "order_products"
            $order_products->order_id = $order->id;
            $order_products->quantity = $cards_product->quantity;
            $order_products->product_id = $cards_product->product_id;
            $order_products->save(); // Save each order product
        }
        
        Card::where('user_id', $user_id)->delete();    
        // Additional logic if needed
    
        return redirect()->back()->with(['message' => 'Your Order Is Done']);



    }
}
