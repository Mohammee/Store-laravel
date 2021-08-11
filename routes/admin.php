<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {

    // i add guest middleware in AdminlonginController
    Route::match(['get', 'post'], '/login',
        [\App\Http\Controllers\Admin\AdminLoginController::class, 'login'])
        ->name('login');

    Route::get('/logout', [\App\Http\Controllers\Admin\AdminLoginController::class, 'logout'])
        ->name('logout');

    // In this middleware you can use laravel auth or admin
    Route::middleware(['auth:admin', 'isApprove'])->group(function () {
        //Dashboard
        Route::get('/', [App\Http\Controllers\Admin\DashboardController::class, 'dashboard'])
            ->name('dashboard');

        //Admins
        Route::match(['get', 'patch'], '/profile', [\App\Http\Controllers\Admin\AdminsController::class, 'profile'])
            ->name('admins.profile');
        Route::get('check-current-pwd', [\App\Http\Controllers\Admin\AdminsController::class, 'checkCurrentPassword'])
            ->name('check-current-pwd');
        Route::patch('update-moderator-status', [\App\Http\Controllers\Admin\AdminsController::class , 'updateModeratorStatus'])
            ->name('update-moderator-status');
        Route::resource('moderators', \App\Http\Controllers\Admin\AdminsController::class)
        ->except('show');

        //Categories
        Route::resource('categories', \App\Http\Controllers\Admin\CategoryController::class)->except('show');
        Route::patch('update-category-status', [\App\Http\Controllers\Admin\CategoryController::class , 'updateCategoryStatus'])
        ->name('update-category-status');
        Route::get('delete-category-image/{category}' , [\App\Http\Controllers\Admin\CategoryController::class , 'deleteCategoryImage'])
            ->name('delete-category-image');

        //Products
        Route::resource('products' , \App\Http\Controllers\Admin\ProductController::class)
        ->except('show');
        Route::patch('update-product-status', [\App\Http\Controllers\Admin\ProductController::class , 'updatePorductStatus'])
            ->name('update-product-status');
        Route::get('products/add-more-option-choice' , [\App\Http\Controllers\Admin\ProductController::class , 'addMoreOptionChoice'])
            ->name('add-more-option-choice');
        Route::get('products/update-sku-combination' , [\App\Http\Controllers\Admin\ProductController::class , 'skuCombination'])
            ->name('sku-combiantion');

         //color
        Route::resource('colors' , \App\Http\Controllers\Admin\ColorController::class)
            ->except(['show' , 'create']);


        //Attribues
        Route::resource('attributes' , \App\Http\Controllers\Admin\AttributesController::class );
        Route::post('store-attribute-values' , [\App\Http\Controllers\Admin\AttributesController::class , 'storeAttributeValues'])
            ->name('store-attribute-values');
        Route::match(['get' , 'patch'] , 'edit-attribute-value/{value}' , [\App\Http\Controllers\Admin\AttributesController::class , 'editAttributeValue'])
            ->name('edit-attribute-value');
        Route::delete('delete-attribute-value/{value}' , [\App\Http\Controllers\Admin\AttributesController::class , 'destroyValue'])
            ->name('delete-attribute-value');


        //Brands
        Route::resource('brands' , \App\Http\Controllers\Admin\BrandController::class)
            ->except('show');
        Route::patch('update-brand-status', [\App\Http\Controllers\Admin\BrandController::class , 'updateBrandStatus'])
            ->name('update-brand-status');

        //Banners
        Route::resource('banners' , \App\Http\Controllers\Admin\BannerController::class);
        Route::patch('update-banner-status', [\App\Http\Controllers\Admin\BannerController::class , 'updateBannerStatus'])
            ->name('update-banner-status');
    });

});
