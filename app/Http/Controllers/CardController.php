<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\subcategories;
use App\Models\User;
use App\Models\WishList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CardController extends Controller
{
    //
    public function car_item()
    {
        $user_id = Auth::user()->id;
        $wishlist_elements = WishList::where('user_id', $user_id)->get();
        $user_info = User::where('id', $user_id)->first();
        $subcategories = subcategories::all();

        $card_elements = Card::where('user_id', $user_id)->get();
        return view('user.pages.shopping_card', compact('card_elements','subcategories', 'wishlist_elements', 'user_info'));
    }

    public function getCartItems(Request $request)
    {
        $user = $request->user();

        $cart_elements = Card::where('user_id', $user->id)->get();

        $totalPrice = $cart_elements->sum('price');

        return response()->json([
            'cart_elements' => $cart_elements,
            'total_price' => $totalPrice,
        ]);
    }


    public function addToCard(Request $request)
    {
        $user_id = Auth::user()->id;
        $product_id = $request->product_id;

        // Check if the product already exists in the Card table for the current user
        $existingCard = Card::where('user_id', $user_id)
            ->where('product_id', $product_id)
            ->first();

        if ($existingCard) {
            // If the product exists, update the price


            $existingCard->price += $request->price_one * $request->quantity;
            $existingCard->quantity += $request->quantity;
            $existingCard->save();
            return response()->json(['message' => 'The Product added to your Cart Successfully']);
        } else {
            // If the product doesn't exist, create a new entry
            $card = new Card();
            $card->user_id = $user_id;
            $card->price_one = $request->price_one;
            $card->product_id = $product_id;
            $card->product_name = $request->product_name;
            $card->price = $request->price_one * $request->quantity;
            $card->image = $request->image;
            $card->quantity = $request->quantity;
            $card->save();
            return redirect()->back()->with(['message' => 'The Product added to your Cart Successfully']);
            // return response()->json(['message' => 'The Product added to your Cart Successfully']);
        }
    }


    public function update_cart(Request $request)
    {
        // $productPrices = []; // Array to store product prices
    
        foreach ($request->input('quantity') as $cardId => $quantity) {
            $card = Card::find($cardId);
    
            if ($card) { // Check if the card exists
                // Get the individual product price from the form
                $productPrice = $request->input("price.{$cardId}");    
                // Update both quantity and price
                $card->quantity = $quantity;
                $card->price = $productPrice * $quantity;
    
                // Save changes to the card
                $card->save();
    
                // Store the product price in the array
                // $productPrices[$cardId] = $productPrice;
            }
        }
    
        // dd($productPrices);
    
         return redirect()->back()->with(['message' => 'Your Cart Updated Successfully']);
    }
    
    
    
    

    public function delete($id)
    {
        Card::find($id)->delete();
        return redirect()->back();
    }



    // checkout


    public function checkout()
    {
        $user_id = Auth::user()->id;
        $wishlist_elements = WishList::where('user_id', $user_id)->get();
        $user_info = User::where('id', $user_id)->first();
        $subcategories = Subcategories::all(); // Make sure the model name is correct and follow Laravel naming conventions
    
        $card_elements = Card::where('user_id', $user_id)->get();
        $cart_total = $card_elements->isEmpty(); // Use isEmpty() to check if the collection is empty
    
        if ($cart_total) {
            return redirect()->back()->with(['message' => 'Your Cart Is Empty']);
        } else {
            return view('user.pages.checkout', compact('card_elements', 'subcategories', 'wishlist_elements', 'user_info'));
        }
    }


    public function check_information(){
        $user_id = Auth::user()->id;
        $wishlist_elements = WishList::where('user_id', $user_id)->get();
        $user_info = User::where('id', $user_id)->first();
        $subcategories = subcategories::all();

        $card_elements = Card::where('user_id', $user_id)->get();
        return view('user.pages.check_information', compact('card_elements','subcategories', 'wishlist_elements', 'user_info'));

    }
}
