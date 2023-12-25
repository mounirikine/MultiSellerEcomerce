<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Brand;
use App\Models\Card;
use App\Models\Categories;
use App\Models\Comments;
use App\Models\Contact;
use App\Models\Product;
use App\Models\Publication;
use App\Models\subcategories;
use App\Models\User;
use App\Models\WishList;
use Egulias\EmailValidator\Parser\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class userController extends Controller
{
    //
   


    public function product()
    {
        if (Auth::check()) {
           $categories = Categories::all();
            $subcategories = subcategories::all();
            $user_id = Auth::user()->id;
            $featured_publications = Brand::all();
            $products = Product::all();
            $static_publications = Publication::all();
            $card_elements = Card::where('user_id', $user_id)->get();
            $categoryIds = $products->pluck('category.id')->unique();
            $user_info =User::where('id',$user_id)->first(); 
            $categoryElectronics = subcategories::where('category_id', 1)->get();
            $categoryNames_sport = subcategories::where('category_id', 5)->get();
            $Home_categories = subcategories::where('category_id', 4)->get();
            $categoryNames_cothing = subcategories::where('category_id', 2)->get();
            $Beauty_category_names = subcategories::where('category_id', 6)->get();
            $Electronics = Product::where('category_id',1)->get();
            $sports = Product::where('category_id',5)->get();
            $home = Product::where('category_id',4)->get();
            $Clothing = Product::where('category_id',2)->get();
            $Beauty = Product::where('category_id',6)->get();
            $wishlist_elements = WishList::where('user_id',$user_id )->get();
            $featured_products = Product::all();
            
    
            return view('user.index', compact('categories','products','subcategories','static_publications','user_info','wishlist_elements','Beauty','Beauty_category_names','home','Home_categories','featured_products','featured_publications', 'card_elements','categoryNames_sport', 'Electronics','sports','categoryElectronics','Clothing','categoryNames_cothing'));
        } else {
            $categories = Categories::all();
            $featured_publications = Brand::all();
            $subcategories = subcategories::all();
            $products = Product::all();
            $card_elements = collect();
            $categoryIds = $products->pluck('category.id')->unique();
            $categoryElectronics = subcategories::where('category_id', 1)->get();
            $categoryNames_cothing = subcategories::where('category_id', 2)->get();
            $Electronics = Product::whereIn('category_id', $categoryIds)->get();
            $Clothing = Product::where('category_id',2)->get();
            $Home_categories = subcategories::where('category_id', 4)->get();
            $home = Product::where('category_id',4)->get();
            $featured_products = Product::all();
            $static_publications = Publication::all();
            $categoryNames_sport = subcategories::where('category_id', 5)->get();
            $sports = Product::where('category_id',5)->get();
            $Beauty_category_names = subcategories::where('category_id', 6)->get();
            $Beauty = Product::where('category_id',6)->get();

    
            return view('user.index', compact('categories','products','Beauty','Beauty_category_names','sports','categoryNames_sport','home','Home_categories','static_publications','featured_products','subcategories', 'card_elements','categoryIds','categoryElectronics','featured_publications','Electronics','Clothing','categoryNames_cothing'));
        }
    }
    

    
    


    public function details($id){
        $user_id = Auth::user()->id;
        
        // Use first() instead of get() to retrieve a single model instance
        $product = Product::where('id', $id)->first();
        $productcomment = Product::where('id', $product->id)->get();
        $comments = Comments::where('product_id', $id)->get();
        $user_info = User::find($user_id);
        $card_elements = Card::where('user_id', $user_id)->get();
        $wishlist_elements = WishList::where('user_id', $user_id)->get();
    
       
        $recommended_products = Product::where('category_id', $product->category_id)->get();
   
      
       
    return view('user.pages.details', compact('recommended_products','user_info', 'product', 'card_elements', 'wishlist_elements' ,'user_id','comments'));
    }
    

    public function category_product_item(){
        $user_id = Auth::user()->id;
        $products = Product::all();
        $user_info = User::find($user_id);
        $card_elements = Card::where('user_id', $user_id)->get();
        $wishlist_elements = WishList::where('user_id',$user_id)->get();
        $Electronics = Product::where('category_id',1)->get();
        $user =User::where('id',$user_id)->first();
        return view('user.pages.category_product_item', compact('products','user_info','card_elements','wishlist_elements','user','Electronics'));

    }
   


    // about

    public function about(){
        $subcategories = subcategories::all();
        $user_id = Auth::user()->id;
        $featured_publications = Brand::all();
        $products = Product::all();
        $static_publications = Publication::all();
        $card_elements = Card::where('user_id', $user_id)->get();
        $categoryIds = $products->pluck('category.id')->unique();
        $user_info =User::where('id',$user_id)->first();
        $categoryNames = subcategories::where('category_id', 1)->get();
        $categoryNames_sport = subcategories::where('category_id', 5)->get();
        $Home_categories = subcategories::where('category_id', 4)->get();
        $categoryNames_cothing = subcategories::where('category_id', 2)->get();
        $Beauty_category_names = subcategories::where('category_id', 6)->get();
        $Electronics = Product::where('category_id',1)->get();
        $sports = Product::where('category_id',5)->get();
        $home = Product::where('category_id',4)->get();
        $Clothing = Product::where('category_id',2)->get();
        $Beauty = Product::where('category_id',6)->get();
        $wishlist_elements = WishList::where('user_id',$user_id )->get();
        $featured_products = Product::all();

        $about_content = About::all()->first();
        return view('user.pages.about', compact('subcategories','about_content','products','user_info', 'card_elements','categoryIds','categoryNames','featured_publications','Electronics','Clothing','categoryNames_cothing'));
    }


    public function contact(){
        $subcategories = subcategories::all();
        $user_id = Auth::user()->id;
        $featured_publications = Brand::all();
        $products = Product::all();
        $static_publications = Publication::all();
        $card_elements = Card::where('user_id', $user_id)->get();
        $categoryIds = $products->pluck('category.id')->unique();
        $user_info =User::where('id',$user_id)->first();
        $categoryNames = subcategories::where('category_id', 1)->get();
        $categoryNames_sport = subcategories::where('category_id', 5)->get();
        $Home_categories = subcategories::where('category_id', 4)->get();
        $categoryNames_cothing = subcategories::where('category_id', 2)->get();
        $Beauty_category_names = subcategories::where('category_id', 6)->get();
        $Electronics = Product::where('category_id',1)->get();
        $sports = Product::where('category_id',5)->get();
        $home = Product::where('category_id',4)->get();
        $Clothing = Product::where('category_id',2)->get();
        $Beauty = Product::where('category_id',6)->get();
        $wishlist_elements = WishList::where('user_id',$user_id )->get();
        $featured_products = Product::all();

        $contact_content = Contact::all()->first();
        return view('user.pages.contact', compact('subcategories','contact_content','products','user_info', 'card_elements','categoryIds','categoryNames','featured_publications','Electronics','Clothing','categoryNames_cothing'));
    }

    public function contact_content(Request $request){
        $user_id = Auth::user()->id;
        $contact = new Contact;
        $contact->user_id = $user_id;
        $contact->subject = $request->subject;
        $contact->message = $request->message;
        $contact->save();

        return redirect()->back()->with(['message'=>'Your Messaged Sent Successfully']);
        
    }
}

