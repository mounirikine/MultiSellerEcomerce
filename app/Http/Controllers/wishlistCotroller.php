<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\Product;
use App\Models\User;
use App\Models\WishList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class wishlistCotroller extends Controller
{
    //
    public function index(){
        $user_id = Auth::user()->id;
        $user_info =User::where('id',$user_id)->first();
        $wishlist_elements = WishList::where('user_id',$user_id)->get();
        $card_elements = Card::where('user_id', $user_id)->get();
        return view('user.pages.wishlist',compact('card_elements' ,'wishlist_elements','user_info'));
    }

    public function addToWishlist(Request $request)
    {
        $user_id = Auth::user()->id;
        $product_id = $request->product_id;
        $existingCard = WishList::where('user_id', $user_id)
        ->where('product_id', $product_id)
        ->first();

        if($existingCard){
            return redirect()->back()->with(['message'=>'The Product Already exist in your wishlist ']);
        }
        else{
        $wishlist = new WishList();
        $wishlist->user_id = $user_id;
        $wishlist->product_id =$request->product_id;
        $wishlist->product_name =$request->product_name;
        $wishlist->image =$request->image;
        $wishlist->price_one =$request->price_one;
        $wishlist->status =$request->status;
        $wishlist->save();

        return redirect()->back()->with(['message'=>'The Product Added to your wishlist successfully ']);;
        }

    }

    public function delete($id){
        WishList::find($id)->delete();
        return redirect()->back();
    }
}
