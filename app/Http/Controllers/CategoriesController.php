<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\Product;
use App\Models\subcategories;
use App\Models\User;
use App\Models\WishList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoriesController extends Controller
{
    //

    public function categories($category){
        $user_id = Auth::user()->id;
        $subcategories = subcategories::all();
        $category_id = subcategories::where('name',$category)->first();
        $user_info = User::find($user_id);
        $category_products = Product::where('subcategory_id',$category_id->id)->get();
        $card_elements = Card::where('user_id', $user_id)->get();
        $wishlist_elements = WishList::where('user_id',$user_id)->get();

        return view('user.pages.category_product_item', compact('category_products','subcategories','user_info', 'card_elements','wishlist_elements','category_id'));

    }


    
}
