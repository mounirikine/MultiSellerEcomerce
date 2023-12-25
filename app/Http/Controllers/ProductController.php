<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ProductController extends Controller
{
    //
    public function AddProduct()
    {
        $Profile_info = Auth::user();
        $categories = Categories::all();
        return view('seller.pages.product.add_product', compact('Profile_info','categories'));
    }
    public function store(Request $request)
    {

        if ($request->hasFile('image')) {

            $product_img = $request->image;

            // Generate a unique name for the logo image
            $product_img_name = now()->format('YmdHis') . '.' . $product_img->getClientOriginalExtension();

            // Store the logo image in the specified directory
            $product_img->storeAs('public/images/products', $product_img_name);
        } else {
            // If no file is present, set $logo_img_name to null
            $product_img_name = null;
        }

        $seller_id = Auth::user()->id;

        $product = new Product();
        $product->product_name = $request->product_name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->old_price = $request->old_price;
        $product->rating = $request->ratting;
        $product->category_id = $request->category_id;
        $product->subcategory_id = $request->subcategory_id;
        $product->quantity = $request->quantity;
        $product->status = $request->status;
        $product->image = $product_img_name;
        $product->seller_id = $seller_id;
        $product->save();

        return redirect()->route('products');
    }

    public function  AllProducts()
    {
        $Profile_info = Auth::user();
        $id=Auth::user()->id;
        $products = Product::where('seller_id',$id)->get();
        return view('seller.pages.product.all_products', compact('Profile_info','products'));


        // foreach ($products as $product) {
        //     // Assuming there is a relationship between Product and Category
        //     $categoryName = $product->category->name;
        //     dd($categoryName);
        // }
    }


    public function destroy($id){

        Product::find($id)->delete();
        return redirect()->route('products');
    }

    public function edit($id){
        $Profile_info = Auth::user();
        $product = Product::Where('id',$id)->first();
        $categories = Categories::all();
        return view('seller.pages.product.edit', compact('product','Profile_info','categories'));


    }

    public function update(Request $request, $id){
        
        if ($request->hasFile('image')) {

            $product_img = $request->image;

            // Generate a unique name for the logo image
            $product_img_name = now()->format('YmdHis') . '.' . $product_img->getClientOriginalExtension();

            // Store the logo image in the specified directory
            $product_img->storeAs('public/images/products', $product_img_name);
        } else {
            // If no file is present, set $logo_img_name to null
            $product_img_name = null;
        }

        $seller_id = Auth::user()->id;

        $product = Product::find($id)->first();
        $product->product_name = $request->product_name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->old_price = $request->old_price;
        $product->rating = $request->ratting;
        $product->category_id = $request->category_id;
        $product->subcategory_id = $request->subcategory_id;
        $product->quantity = $request->quantity;
        $product->status = $request->status;
        $product->image = $product_img_name;
        $product->seller_id = $seller_id;
        $product->save();

        return redirect()->route('products');
    }

  
}
