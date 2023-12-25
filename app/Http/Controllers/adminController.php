<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Categories;
use App\Models\Contact;
use App\Models\Product;
use App\Models\subcategories;
use App\Models\Subcategory;
use App\Models\User;
use Illuminate\Http\Request;

class adminController extends Controller
{
    //

    public function index()
   {
    return view('admin.pages.index');
   }


   public function all_users(){
    $users = User::where('role','user')->get();

    return view('admin.pages.users.all_users',compact('users'));
   }
   public function all_sellers(){
    $sellers = User::where('role','seller')->get();

    return view('admin.pages.users.all_sellers',compact('sellers'));
   }


   public function change_to_seller($id){
    $user = User::find($id);
    $user->role = 'seller';
    $user->save();

    return redirect()->back()->with(['message'=>'Your confirmation IS Done']);

   }
   public function change_to_user($id){
    $user = User::find($id);
    $user->role = 'user';
    $user->save();

    return redirect()->back()->with(['message'=>'Your confirmation IS Done']);

   }
   public function delete($id){
    User::find($id)->delete();
   

    return redirect()->back()->with(['message'=>'seller deleted successfully']);

   }


    public function About(){
        $About_content = About::all();
        return view('admin.pages.about', compact('About_content'));
    }

    public function edit_about($id){
        $About_content = About::find($id)->first();
        return view('admin.pages.edit_about', compact('About_content'));

    }
    public function store_about(Request $request , $id){

        $About_content = About::find($id)->first();
        
        if ($request->hasFile('image')) {

            $about_img = $request->image;

            // Generate a unique name for the logo image
            $about_img_name = now()->format('YmdHis') . '.' . $about_img->getClientOriginalExtension();

            // Store the logo image in the specified directory
            $about_img->storeAs('public/images/about', $about_img_name);
        } else {
            // If no file is present, set $logo_img_name to null
            $about_img_name = null;
        }
        $About_content->image = $about_img_name;
        $About_content->small_title = $request->small_title;
        $About_content->big_title = $request->big_title;
        $About_content->description = $request->description;
        $About_content->save();

        
        return redirect()->route('admin.About')->with(['message'=>'About Page Updated successfully']);


    }


    public function products(){
        $products = Product::all();
        return view('admin.pages.products.products',compact('products'));
    }


    public function delete_products($id){
        Product::find($id)->delete();
        return redirect()->back()->with(['message'=>'Product deleted successfully']);

    }

    public function categories_subcategories(){

        $categories= Categories::all();
        $subCategories = subcategories::all();
        return view('admin.pages.products.categories',compact('categories','subCategories'));
    }

    public function categories_add(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|unique:categories', // Ensure 'name' is unique in the 'categories' table
        ]);
    
        // Check if the category already exists
        $existingCategory = Categories::where('name', $request->name)->first();
    
        if ($existingCategory) {
            // Category already exists, return with an error message
            return redirect()->back()->with(['message' => 'Category already exists']);
        }
    
        // Category does not exist, create and save it
        $categories = new Categories();
        $categories->name = $request->name;
        $categories->save();
    
        // Redirect back with a success message
        return redirect()->back()->with(['message' => 'Category added successfully']);
    }


    public function subcategories_add(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|unique:subcategories', // Ensure 'name' is unique in the 'categories' table
        ]);
    
        // Check if the category already exists
        $existingCategory = subcategories::where('name', $request->name)->first();
    
        if ($existingCategory) {
            // Category already exists, return with an error message
            return redirect()->back()->with(['message' => 'Category already exists']);
        }
    
        // Category does not exist, create and save it
        $subcategories = new subcategories();
        $subcategories->name = $request->name;
        $subcategories->category_id = $request->category_id;
        $subcategories->save();
    
        // Redirect back with a success message
        return redirect()->back()->with(['message' => 'SubCategory added successfully']);
    }
    

    public function contact(){
        $contacts = Contact::all();
        return view('admin.pages.contact',compact('contacts'));

    }
   
    public function delete_contact($id){
        Contact::find($id)->delete();
        // Redirect back with a success message
        return redirect()->back()->with(['message' => 'Message Deleted successfully']);
    }
   

}
