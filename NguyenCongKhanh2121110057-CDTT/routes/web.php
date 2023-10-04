<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\SiteController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\MenuController;
use App\Http\Controllers\Backend\OrderController;
use App\Http\Controllers\Backend\OrderdetailController;
use App\Http\Controllers\Backend\PostController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\TopicController;
use App\Http\Controllers\Backend\ContactController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\AuthController;
Route::get('/', [SiteController::class, 'index'])->name('site.index');
Route::get('/san-pham',[SiteController::class, 'products'])->name('site.products');
Route::get('/san-pham-danh-muc/{slug}',[SiteController::class, 'product_category'])->name('site.product_category');
Route::get('/san-pham-thuong-hieu/{slug}',[SiteController::class, 'product_brand'])->name('site.product_brand');
Route::get('/bai-viet',[SiteController::class, 'post'])->name('site.post');
Route::get('/gio-hang',[SiteController::class, 'cart'])->name('site.cart');
Route::get('/gio-hang/addcart/{id}',[SiteController::class, 'addcart'])->name('site.addcart');
Route::get('/gio-hang/delcart/{id}',[SiteController::class, 'delcart'])->name('site.delcart');
Route::get('/gio-hang/delcart',[SiteController::class, 'delcart'])->name('site.delcartall');
Route::post('/gio-hang/update',[SiteController::class, 'updatecart'])->name('site.updatecart');
Route::get('/tiem-kiem',function(){echo"tat ca tiem kiem";});
Route::get('/khach-hang',function(){echo"tat ca khach hang";});
Route::get('/lien-he',[SiteController::class, 'contact'])->name('site.contact');
Route::get('/tin-tuc',[SiteController::class, 'news'])->name('site.news');
Route::get('/Gioi-thieu',[SiteController::class, 'introduce'])->name('site.introduce');


Route::get('/admin/login', [AuthController::class, 'getlogin'])->name('admin.login');
Route::post('/admin/login', [AuthController::class, 'postlogin'])->name('admin.postlogin');

Route::prefix('admin')->middleware('loginAdmin')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::get('/logout', [AuthController::class, 'logout'])->name('admin.logout');
    //category
    Route::get('category/trash', [CategoryController::class, 'trash'])->name('category.trash');
    Route::get('category/status/{category}', [CategoryController::class, 'status'])->name('category.status');
    Route::get('category/delete/{category}', [CategoryController::class, 'delete'])->name('category.delete');
    Route::get('category/restore/{category}', [CategoryController::class, 'restore'])->name('category.restore');
    Route::resource('category', CategoryController::class);
    Route::get('brand/trash', [BrandController::class, 'trash'])->name('brand.trash');
    Route::get('brand/status/{brand}', [BrandController::class, 'status'])->name('brand.status');
    Route::get('brand/delete/{brand}', [BrandController::class, 'delete'])->name('brand.delete');
    Route::get('brand/restore/{brand}', [BrandController::class, 'restore'])->name('brand.restore');
    Route::resource('brand', BrandController::class);
    //menu
    Route::get('menu/trash', [MenuController::class, 'trash'])->name('menu.trash');
    Route::get('menu/status/{menu}', [MenuController::class, 'status'])->name('menu.status');
    Route::get('menu/delete/{menu}', [MenuController::class, 'delete'])->name('menu.delete');
    Route::get('menu/restore/{menu}', [MenuController::class, 'restore'])->name('menu.restore');
    Route::resource('menu', MenuController::class);

    //product
    Route::get('product/trash', [ProductController::class, 'trash'])->name('product.trash');
    Route::get('product/status/{product}', [ProductController::class, 'status'])->name('product.status');
    Route::get('product/delete/{product}', [ProductController::class, 'delete'])->name('product.delete');
    Route::get('product/restore/{product}', [ProductController::class, 'restore'])->name('product.restore');
    Route::resource('product', ProductController::class);
    Route::resource('order', OrderController::class);

    Route::get('post/trash', [postController::class, 'trash'])->name('post.trash');
    Route::get('post/status/{post}', [postController::class, 'status'])->name('post.status');
    Route::get('post/delete/{post}', [postController::class, 'delete'])->name('post.delete');
    Route::get('post/restore/{post}', [postController::class, 'restore'])->name('post.restore');
    Route::resource('post', PostController::class);
    Route::resource('contact', ContactController::class);
    Route::resource('slider', SliderController::class);
    //topic
    Route::get('topic/trash', [TopicController::class, 'trash'])->name('topic.trash');
    Route::get('topic/status/{topic}', [TopicController::class, 'status'])->name('topic.status');
    Route::get('topic/delete/{topic}', [TopicController::class, 'delete'])->name('topic.delete');
    Route::get('topic/restore/{topic}', [TopicController::class, 'restore'])->name('topic.restore');
    Route::resource('topic', TopicController::class);

    Route::get('user/trash', [UserController::class, 'trash'])->name('user.trash');
    Route::get('user/status/{user}', [UserController::class, 'status'])->name('user.status');
    Route::get('user/delete/{user}', [UserController::class, 'delete'])->name('user.delete');
    Route::get('user/restore/{user}', [UserController::class, 'restore'])->name('user.restore');

    Route::resource('user', UserController::class);


    Route::resource('orderdetail', OrderdetailController::class);
});
Route::get('{slug}', [SiteController::class, 'index'])->name('site.slug');