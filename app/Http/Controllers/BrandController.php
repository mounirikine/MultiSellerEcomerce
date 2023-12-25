<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Publication;
use Illuminate\Http\Request;
use PHPUnit\Framework\MockObject\ReturnValueNotConfiguredException;

class BrandController extends Controller
{
    //

    public function brands_featured(){
        $brands = Brand::all();
        return view('admin.pages.featured',compact('brands'));
    }
    public function brand_pub_featured(){
        return view('admin.pages.brand_pub_featured');
    }
    public function store_pub_featured(Request $request){
        if ($request->hasFile('image')) {

            $pub_img = $request->image;

            // Generate a unique name for the logo image
            $pub_img_name = now()->format('YmdHis') . '.' . $pub_img->getClientOriginalExtension();

            // Store the logo image in the specified directory
            $pub_img->storeAs('public/images/publication', $pub_img_name);
        } else {
            // If no file is present, set $logo_img_name to null
            $pub_img_name = null;
        }


        $brand = new Brand();

        $brand->image = $pub_img_name;
        $brand->save();


        return redirect()->route('brands_featured')->with(['message'=>'Product Added Successfully']);



    }

    public function delete($id){
        Brand::find($id)->delete();
        return redirect()->back()->with(['message'=>'Product Deleted Successfully']);
    }



    public function Home_publications(){
        $publications = Publication::all();
        return view('admin.pages.Home_publications', compact('publications'));

    }

    public function add_publication(){
        return view('admin.pages.add_publication');

    }

    public function store_publication(Request $request){
        if ($request->hasFile('image')) {

            $pub_img = $request->image;

            // Generate a unique name for the logo image
            $pub_img_name = now()->format('YmdHis') . '.' . $pub_img->getClientOriginalExtension();

            // Store the logo image in the specified directory
            $pub_img->storeAs('public/images/publication', $pub_img_name);
        } else {
            // If no file is present, set $logo_img_name to null
            $pub_img_name = null;
        }


        $publication = new Publication();

        $publication->image = $pub_img_name;
        $publication->save();


        return redirect()->route('Home_publications')->with(['message'=>'Product Added Successfully']);
    }

    
    
}
