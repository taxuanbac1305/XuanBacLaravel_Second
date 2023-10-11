<?php

use App\Http\Controllers\frontend\HomeController;
use App\Http\Controllers\frontend\BaivietController;
use App\Http\Controllers\frontend\GiohangController;
use App\Http\Controllers\frontend\LienHeController;
use App\Http\Controllers\frontend\SanphamController;
use App\Http\Controllers\frontend\TimkiemController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\backend\DashboardController;
use App\Http\Controllers\backend\BannerController;
use App\Http\Controllers\backend\BrandController;
use App\Http\Controllers\backend\CategoryController;
use App\Http\Controllers\backend\ConfigController;
use App\Http\Controllers\backend\ContactController;
use App\Http\Controllers\backend\CustomerController;
use App\Http\Controllers\backend\MenuController;
use App\Http\Controllers\backend\OrderController;
use App\Http\Controllers\backend\PageController;
use App\Http\Controllers\backend\PostController;
use App\Http\Controllers\backend\ProductController;
use App\Http\Controllers\backend\TopicController;
use App\Http\Controllers\backend\UserController;




//Khai báo Route trang người dùng
Route::get('/', [HomeController::class, 'index'])->name('site.home');
Route::get('/trang-chu', [HomeController::class, 'index']);

// Danh mục sản phẩm trang chủ
Route::get('/danh-muc-san-pham/{category_id}', [HomeController::class, 'show_category_home']);
Route::get('/thuong-hieu-san-pham/{brand_id}', [HomeController::class, 'show_brand_home']);
Route::get('/chi-tiet-san-pham/{product_id}', [HomeController::class, 'details_product']);




//Khai báo route trong quản lý
Route::prefix('admin')->group(function(){
    #admin
    Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');

    #admin/banner
    Route::resource('banner', BannerController::class);

    #admin/brand
    Route::resource('brand', BrandController::class);
    Route::get('/all-brand-product', [DashboardController::class, 'all_brand_product']);
    Route::get('/add-brand-product', [BrandController::class, 'add_brand_product']);
    Route::get('/edit-brand-product/{brand_product_id}', [BrandController::class, 'edit_brand_product']);
    Route::get('/delete-brand-product/{brand_product_id}', [BrandController::class, 'delete_brand_product']);
    Route::get('/unactive-brand-product/{brand_product_id}', [BrandController::class, 'unactive_brand_product']);
    Route::get('/active-brand-product/{brand_product_id}', [BrandController::class, 'active_brand_product']);
    Route::post('/save-brand-product', [BrandController::class, 'save_brand_product']);
    Route::post('/update-brand-product/{brand_product_id}', [BrandController::class, 'update_brand_product']);

    #admin/category
    Route::resource('category', CategoryController::class);
    Route::get('/all-category-product', [DashboardController::class, 'all_category_product']);
    Route::get('/add-category-product', [CategoryController::class, 'add_category_product']);
    Route::get('/edit-category-product/{category_product_id}', [CategoryController::class, 'edit_category_product']);
    Route::get('/delete-category-product/{category_product_id}', [CategoryController::class, 'delete_category_product']);
    Route::get('/unactive-category-product/{category_product_id}', [CategoryController::class, 'unactive_category_product']);
    Route::get('/active-category-product/{category_product_id}', [CategoryController::class, 'active_category_product']);
    Route::post('/save-category-product', [CategoryController::class, 'save_category_product']);
    Route::post('/update-category-product/{category_product_id}', [CategoryController::class, 'update_category_product']);
    #admin/config
    Route::resource('config', ConfigController::class);

    #admin/contact
    Route::resource('contact', ContactController::class);

    #admin/customer
    Route::resource('customer', CustomerController::class);

    #admin/menu
    Route::resource('menu', MenuController::class);

    #admin/order
    Route::resource('order', OrderController::class);

    #admin/page
    Route::resource('page', PageController::class);

    #admin/post
    Route::resource('post', PostController::class);

    #admin/product
    Route::resource('product', ProductController::class);
    Route::get('/all-product', [DashboardController::class, 'all_product']);
    Route::get('/add-product', [ProductController::class, 'add_product']);
    Route::get('/edit-product/{product_id}', [ProductController::class, 'edit_product']);
    Route::get('/delete-product/{product_id}', [ProductController::class, 'delete_product']);
    Route::get('/unactive-product/{product_id}', [ProductController::class, 'unactive_product']);
    Route::get('/active-product/{product_id}', [ProductController::class, 'active_product']);
    Route::post('/save-product', [ProductController::class, 'save_product']);
    Route::post('/update-product/{product_id}', [ProductController::class, 'update_product']);

    #admin/topic
    Route::resource('topic', TopicController::class);

    #admin/user
    Route::resource('user', UserController::class);
});