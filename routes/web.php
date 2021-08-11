<?php

use App\Models\Category;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});
////
//Route::get('/landing' , function (){
//    return view('frontend.landing.home');
//});
//
Route::get('/cart', function () {
    return view('frontend.cart.cart');
});

//Route::get('/categories' , function (){
//    return view('frontend.category.categories');
//});

Route::get('/contact', function () {
    return view('frontend.contact.contact');
});
//
Route::get('/checkout', function () {
    return view('frontend.checkout.checkout');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');





Route::get('/', [\App\Http\Controllers\Front\LandingController::class, 'index'])
    ->name('landing');

Route::get('/load-feature-more', [\App\Http\Controllers\Front\LandingController::class, 'loadMoreNewProducts'])
    ->name('landing.load-new-more');


Route::get('/categories', [\App\Http\Controllers\Front\ShopController::class, 'allCategories'])
    ->name('shop.categories');

Route::get('/category/{url}', [\App\Http\Controllers\Front\ShopController::class, 'category'])
    ->name('shop.show-category');

Route::get('/category/{url}/filter', [\App\Http\Controllers\Front\ShopController::class, 'filter'])
    ->name('shop.filter');

Route::get('/category/{url}/load_more', [\App\Http\Controllers\Front\ShopController::class, 'loadMore'])
    ->name('shop.load_more');

Route::get('/brands', [\App\Http\Controllers\Front\ShopController::class, 'allBrands'])
    ->name('shop.brands');

Route::get('/brand/{url}', [\App\Http\Controllers\Front\ShopController::class, 'brand'])
    ->name('shop.show-brand');

Route::get('/search', [\App\Http\Controllers\Front\SearchController::class, 'index'])
    ->name('shop.search');

Route::get('/product/{url}' , [\App\Http\Controllers\Front\ProductController::class , 'show'])
    ->name('products.show');

Route::get('/products/product-model/{id}' , [\App\Http\Controllers\Front\ProductController::class , 'showProductModel'])
    ->name('products.show-product-model');

Route::post('/product/variant-price' , [\App\Http\Controllers\Front\ProductController::class , 'getVariantPrice'])
    ->name('product-variant-price');

Route::post('/cart' , [\App\Http\Controllers\Front\CartController::class , 'addToCart'])
    ->name('add-to-cart');
Auth::routes();

















Route::get('/all' , function (){
//    dd(\App\Models\VariationValue::all());
//dd(\App\Models\Product::pluck('id'));
    dd(\App\Models\VariationValue::whereIn('option_value_id' , [1,3])->get());
    dd(\App\Models\Variation::whereHas('variationValues' , function ($q) {
        $q->whereIn('option_value_id' , [2,3]);
    })->with('variationValues')->get());
$ids = \App\Models\Product::first()->variations()->pluck('id')->toArray();
$values = \App\Models\VariationValue::whereIn('variation_id' , $ids)->get()->pluck('option_value_id');
dd($values);
    Debugbar::startMeasure('render','Time for rendering');
//    cache(['products'=> \App\Models\Product::all()] , 10);
//$products = cache()->remember('products' , now()->addMinute() , function (){
$product =  cache()->remember('products', now()->addMinute() , function () {

    return \App\Models\Product::when(true, fn($q) => $q
        ->whereHas('categories', function ($q) {
            $q->where('categories.id', '>', 1)->orderByDesc('categories.id');
        }))->whereHas('translation', function ($query) {
        $query->where('name', 'like', '%a%')
            ->orWhere('url', 'like', '%a%')
            ->orWhere('description', 'like', '%a%');
    })->get();
});
    Debugbar::stopMeasure('render');

return $product . '';
});

Route::get('json' , function (){
//      \Illuminate\Support\Facades\Artisan::call('migrate:fresh' , ['--seed' => true , '--force' => true]);
    dd(session()->getId());
   return response()->json(['product' => \App\Models\Product::all()]);
});

