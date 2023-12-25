<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\subcategories;
use App\Models\User;
use App\Models\WishList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    //

    public function account()
    {
        $user_id = Auth::user()->id;
        $user_info = User::where('id',$user_id)->first();
        $card_elements = Card::where('user_id', $user_id)->get();
        $wishlist_elements = WishList::where('user_id',$user_id)->get();
        $subcategories = subcategories::all();

       
        
        return view('user.pages.account',compact('user_id','user_info','subcategories','card_elements','wishlist_elements'));
    }


    public function update(Request $request)
    {
        // Process product image
        if ($request->hasFile('image')) {
            $productImage = $request->file('image');
    
            // Generate a unique name for the product image
            $productImageName = 'product_' . now()->format('YmdHis') . '.' . $productImage->getClientOriginalExtension();
    
            // Store the product image in the specified directory
            $productImage->storeAs('public/images/products', $productImageName);
        } else {
            // If no file is present, set $productImageName to null
            $productImageName = null;
        }
    
        // Process brand image
        if ($request->hasFile('brand')) {
            $brandImage = $request->file('brand');
    
            // Generate a unique name for the brand image
            $brandImageName = 'brand_' . now()->format('YmdHis') . '.' . $brandImage->getClientOriginalExtension();
    
            // Store the brand image in the specified directory
            $brandImage->storeAs('public/images/brands', $brandImageName);
        } else {
            // If no file is present, set $brandImageName to null
            $brandImageName = null;
        }
    
        $userId = Auth::user()->id;
        $user = User::find($userId);
    
        // Update user information
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        $user->state = $request->input('state');
        $user->image = $productImageName;
        $user->brand = $brandImageName;
        $user->address = $request->input('address');
        $user->zip_code = $request->input('zip_code');
        $user->country = $request->input('country');
        $user->save();
    
        return redirect()->back()->with(['message' => 'Profile Updated Successfully']);
    }
    
    
    
}
