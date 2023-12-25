<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CardController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\sellerController;
use App\Http\Controllers\userController;
use App\Http\Controllers\wishlistCotroller;
use Illuminate\Support\Facades\Route;


/*

|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('user.index');
// });

Route::get('/', [userController::class, 'product'])->name('fetch.cart');
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/addToCard', [CardController::class, 'addToCard'])->name('addToCard');
    Route::get('/delete/card/{id}', [CardController::class, 'delete'])->name('delete.card');
    Route::get('/card', [CardController::class, 'car_item'])->name('card');
    Route::get('/wishlist', [wishlistCotroller::class, 'index'])->name('wishlist');
    Route::post('/add/to/wishlist', [wishlistCotroller::class, 'addToWishlist'])->name('add.to.wishlist');
    Route::get('delete/wishlist/{id}', [wishlistCotroller::class, 'delete'])->name('delete.wishlist');
    Route::post('update_qte', [CardController::class, 'update_cart'])->name('update_cart');
    Route::get('/details/{id}', [userController::class, 'details'])->name('details');
    Route::get('/category', [userController::class, 'category_product_item'])->name('category_product_item');
    // about
    Route::get('about',[userController::class ,'about'])->name('user.about');


    // contact
    Route::get('contact',[userController::class ,'contact'])->name('user.contact');
    Route::post('contact_content',[userController::class ,'contact_content'])->name('contact_content');


    Route::get('/category/{category}', [CategoriesController::class, 'categories'])->name('category');

    Route::post('comment', [CommentsController::class, 'comment'])->name('comment');
    Route::get('/account', [AccountController::class, 'account'])->name('account');
    Route::post('/update/account', [AccountController::class, 'update'])->name('update.account');


    //checkout

    Route::get('checkout',[CardController::class ,'checkout'])->name('checkout');
    Route::get('check/information',[CardController::class ,'check_information'])->name('check.information');
    Route::post('check/order_chach_delevery',[OrdersController::class ,'order_chach_delevery'])->name('order_chach_delevery');



});

require __DIR__ . '/auth.php';


Route::middleware('auth', 'role:admin')->group(function () {
    Route::get('/admin/dashboard', [adminController::class, 'index']);
    Route::get('/brands_featured',[BrandController::class ,'brands_featured'])->name('brands_featured');
    Route::get('/Home_publications',[BrandController::class ,'Home_publications'])->name('Home_publications');
    Route::get('/add/featured',[BrandController::class ,'brand_pub_featured'])->name('add.brand_pub_featured');
    Route::get('/add/publication',[BrandController::class ,'add_publication'])->name('add.publication');
    Route::post('/store/featured',[BrandController::class ,'store_pub_featured'])->name('store.pub.featured');
    Route::post('/store/publication',[BrandController::class ,'store_publication'])->name('store.publication');
    Route::get('/delete/brand_pub/{id}',[BrandController::class ,'delete'])->name('delete.brand_pub');

    // users

    Route::get('admin/all_users',[adminController::class ,'all_users'])->name('admin.all_users');
    Route::post('change_to_seller/{id}',[adminController::class ,'change_to_seller'])->name('change_to_seller');
    Route::get('delete_user/{id}',[adminController::class ,'delete'])->name('delete.user');

    // sellers 

    Route::get('admin/all_sellers',[adminController::class ,'all_sellers'])->name('admin.all_sellers');
    Route::post('change_to_user/{id}',[adminController::class ,'change_to_user'])->name('change_to_user');
    Route::get('delete_seller/{id}',[adminController::class ,'delete'])->name('delete.seller');


    // About

    Route::get('/Admin/About',[adminController::class ,'About'])->name('admin.About');
    Route::get('/Admin/About/edit/{id}',[adminController::class ,'edit_about'])->name('edit.about');
    Route::post('/Admin/About/store/{id}',[adminController::class ,'store_about'])->name('store.about');


    // products 


    Route::get('/admin/products',[adminController::class,'products' ])->name('admin.products');
    Route::get('admin/delete/products/{id}',[adminController::class ,'delete_products'])->name('admin.delete.products');

    // categories / subcategories 

    Route::get('admin/categories/subcategories',[adminController::class ,'categories_subcategories'])->name('admin.categories.subcategories');
    Route::post('admin/categories/add',[adminController::class ,'categories_add'])->name('add.category');
    Route::post('admin/subcategories/add',[adminController::class ,'subcategories_add'])->name('add.subcategory');
   
    
    
    // contact 

    Route::get('admin/contact',[adminController::class ,'contact'])->name('admin.contact');
    Route::get('delete/contact/{id}',[adminController::class ,'delete_contact'])->name('delete.contact');



    // Route::get('admin/categories',[adminController::class ,'categories'])->name('admin.categories');




});
Route::middleware('auth', 'role:seller')->group(function () {
    Route::get('/seller/dashboard', [sellerController::class, 'index']);
    Route::get('/seller/profile', [sellerController::class, 'profile'])->name('profile');
    Route::post('update/profile', [sellerController::class, 'update'])->name('update.profile');
    Route::get('add/product', [ProductController::class, 'AddProduct'])->name('add.product');
    Route::get('products', [ProductController::class, 'AllProducts'])->name('products');
    Route::post('store/product', [ProductController::class, 'store'])->name('store.product');
    Route::get('delete/product/{id}', [ProductController::class, 'destroy'])->name('delete.product');
    Route::get('edit/product/{id}', [ProductController::class, 'edit'])->name('edit.product');
    Route::put('update/product/{id}', [ProductController::class, 'update'])->name('product.update');


    // orders 

    Route::get('seller/orders',[sellerController::class ,'orders'])->name('seller.orders');
    Route::get('seller_show_order_detals/{id}', [sellerController::class, 'seller_show_order_detals'])->name('seller_show_order_detals');
    
    
});










// Route::get('/fetch-cart', [CardController::class ,'fetchCart'] )->name('fetch.cart');
