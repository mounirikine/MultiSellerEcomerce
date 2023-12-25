<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\order_products;
use App\Models\orders;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function Ramsey\Uuid\v1;

class sellerController extends Controller
{
    //
    public function index(){
        $Profile_info = Auth::user();
        return view('seller.pages.index',compact('Profile_info'));
    }

    public function profile(){
        $Profile_info = Auth::user();
        return view('seller.pages.profile' ,compact('Profile_info'));
    }

    public function update(Request $request){

        if ($request->hasFile('image')) {
            
            $logo_img = $request->image;
    
            // Generate a unique name for the logo image
            $logo_img_name = 'product_' . now()->format('YmdHis'). '.' . $logo_img->getClientOriginalExtension();
    
            // Store the logo image in the specified directory
            $logo_img->storeAs('public/images/products', $logo_img_name);
        } else {
            // If no file is present, set $logo_img_name to null
            $logo_img_name = null;
        }

        $profile_id = Auth::user()->id;

        $profile = User::find($profile_id);
        $profile->name = $request->name;
        $profile->email = $request->email;
        $profile->image = $logo_img_name;
        $profile->brand = $request->brand;
        $profile->phone = $request->phone;
        $profile->address = $request->address;
        $profile->state = $request->state;
        $profile->zip_code = $request->zip_code;
        $profile->country = $request->country;
        $profile->save();

        return redirect()->route('profile')->with(['message'=>'profile update successfully']);
        

        
    }



    public function orders(){

        $Profile_info = Auth::user();
        
        
        $orders = order_products::all();

        $order_just = orders::all();
       
      

         return view('seller.pages.orders',compact('Profile_info','orders','order_just'));
    }

    
    public function seller_show_order_detals($id){
        $Profile_info = Auth::user();
        $order_products = order_products::where('order_id',$id)->get();
        $card_info = Card::where('user_id',$id)->first();
        $order_total = orders::where('id',$id)->first();
        return view('seller.pages.seller_show_order_detals',compact('Profile_info','order_total','order_products','card_info'));

    }


}
