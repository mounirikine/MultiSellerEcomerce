<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Card;
use App\Models\subcategories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubcategoryController extends Controller
{
    //
    public function index($categoryId)
    {
        // Récupérez les sous-catégories associées à la catégorie spécifiée
        $subcategories = subcategories::where('category_id', $categoryId)->get();

        // Retournez les sous-catégories en tant que réponse JSON
        return response()->json($subcategories);
    }


    public function fetchCart()
    {
        $user_id = Auth::user()->id;
        $cartItems = Card::where('user_id', $user_id)->get();
    
        return response()->json($cartItems);
    }
}
