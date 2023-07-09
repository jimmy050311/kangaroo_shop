<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;

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

Route::get('/', function () {
    return view('home/home');
});
Route::get('/contact', function() {
    return view('home/contact');
});
Route::get('/about', function() {
    return view('home/about');
});
Route::get('/shop/{id}', function() {
    return view('home/shop');
});
Route::group(['prefix' => '/'], function() {
    Route::get('/product/{id}', [\App\Http\Controllers\Frontend\Product\ProductController::class, 'loadView']);
});
Route::get('/cart', function() {
    return view('account/cart');
});
Route::get('/account', function() {
    return view('account/account');
});
Route::get('/sign', function() {
    return view('sign/sign');
});
Route::get('/register', function() {
    return view('sign/register');
});

//後台
Route::get('/manage/login', function() {
    return view('backend');
});
Route::group(['prefix' => '/manage', 'middleware' => 'verfied.auth'], function() {
    Route::get('/overview', function () {
        return view('backend');
    });
    Route::get('/admin', function () {
        return view('backend');
    });
    
    Route::prefix('user')->group(function() {
        Route::get('/create', function () {
            return view('backend');
        });
        Route::get('/edit/{id}', function () {
            return view('backend');
        });
        Route::get('/', function () {
            return view('backend');
        });
    });
    Route::prefix('product')->group(function() {
        Route::get('/', function () {
            return view('backend');
        });
        Route::get('/category', function () {
            return view('backend');
        });
        Route::get('/create', function () {
            return view('backend');
        });
        Route::get('/edit/{id}', function () {
            return view('backend');
        });
    });
    Route::get('/inventory', function () {
        return view('backend');
    });
    Route::get('/inventory/manage', function () {
        return view('backend');
    });
    Route::get('/inventory/change', function () {
        return view('backend');
    });
    Route::get('/inventory/purchase', function () {
        return view('backend');
    });
    Route::prefix('order')->group(function() {
        Route::get('/', function () {
            return view('backend');
        });
        Route::get('/create', function () {
            return view('backend');
        });
        Route::get('/edit/{id}', function () {
            return view('backend');
        });
    });
    Route::get('/contact', function () {
        return view('backend');
    });
});

//前台api
Route::prefix('front')->group(function() {
    Route::prefix('user')->group(function() {
        Route::get('/api/{id}', [\App\Http\Controllers\Frontend\User\UserController::class, 'show']);
        Route::put('/api/{id}', [\App\Http\Controllers\Frontend\User\UserController::class, 'update']);
        Route::put('/api/change-password/{id}', [\App\Http\Controllers\Frontend\User\UserController::class, 'changePassword']);
        Route::post('/api/login', [\App\Http\Controllers\Frontend\User\UserController::class, 'login']);
        Route::post('/api/logout', [\App\Http\Controllers\Frontend\User\UserController::class, 'logout']);
    });
    Route::prefix('category')->group(function() {
        Route::get('/api', [\App\Http\Controllers\Frontend\Category\CategoryController::class, 'index']);
    });
    Route::prefix('product')->group(function() {
        Route::get('/api', [\App\Http\Controllers\Frontend\Product\ProductController::class, 'index']);
        Route::get('/api/{id}', [\App\Http\Controllers\Frontend\Product\ProductController::class, 'show']);
    });
    Route::prefix('contact')->group(function() {
        Route::post('/api', [\App\Http\Controllers\Frontend\Contact\ContactController::class, 'store']);
    });
    Route::prefix('cart')->group(function() {
        Route::post('/api', [\App\Http\Controllers\Frontend\Cart\CartController::class, 'store']);
        Route::get('/api/{id}', [\App\Http\Controllers\Frontend\Cart\CartController::class, 'show']);
        Route::delete('/api/{id}', [\App\Http\Controllers\Frontend\Cart\CartController::class, 'destroy']);
        Route::post('/api/clear', [\App\Http\Controllers\Frontend\Cart\CartController::class, 'clearCart']);
    });
    Route::prefix('product-comment')->group(function() {
        Route::post('/api', [\App\Http\Controllers\Frontend\Product\ProductCommentController::class, 'store']);
        Route::get('/api', [\App\Http\Controllers\Frontend\Product\ProductCommentController::class, 'index']);
    });
    Route::prefix('order')->group(function() {
        Route::get('/api', [\App\Http\Controllers\Frontend\Order\OrderController::class, 'index']);
        Route::post('/api', [\App\Http\Controllers\Frontend\Order\OrderController::class, 'store']);
    });
});

//後台api
Route::prefix('v1')->group(function() {
    //管理員
    Route::prefix('admin')->group(function() {
        Route::get('/api', [\App\Http\Controllers\Admin\AdminController::class, 'index']);
        Route::post('/api', [\App\Http\Controllers\Admin\AdminController::class, 'store']);
        Route::get('/api/{id}', [\App\Http\Controllers\Admin\AdminController::class, 'show']);
        Route::put('/api/{id}', [\App\Http\Controllers\Admin\AdminController::class, 'update']);
    });
    //會員
    Route::prefix('user')->group(function() {
        Route::get('/api', [\App\Http\Controllers\User\UserController::class, 'index']);
        Route::get('/api/obtain', [\App\Http\Controllers\User\UserController::class, 'obtain']);
        Route::post('/api', [\App\Http\Controllers\User\UserController::class, 'store']);
        Route::get('/api/{id}', [\App\Http\Controllers\User\UserController::class, 'show']);
        Route::put('/api/{id}', [\App\Http\Controllers\User\UserController::class, 'update']);
    });
    //類別
    Route::prefix('category')->group(function() {
        Route::get('/api', [\App\Http\Controllers\Product\CategoryController::class, 'index']);
        Route::post('/api', [\App\Http\Controllers\Product\CategoryController::class, 'store']);
        Route::get('/api/{id}', [\App\Http\Controllers\Product\CategoryController::class, 'show']);
        Route::put('/api/{id}', [\App\Http\Controllers\Product\CategoryController::class, 'update']);
        Route::delete('/api/{id}', [\App\Http\Controllers\Product\CategoryController::class, 'destroy']);
    });
    //產品
    Route::prefix('product')->group(function() {
        Route::get('/api', [\App\Http\Controllers\Product\ProductController::class, 'index']);
        Route::get('/api/obtain', [\App\Http\Controllers\Product\ProductController::class, 'obtain']);
        Route::post('/api', [\App\Http\Controllers\Product\ProductController::class, 'store']);
        Route::get('/api/{id}', [\App\Http\Controllers\Product\ProductController::class, 'show']);
        Route::put('/api/{id}', [\App\Http\Controllers\Product\ProductController::class, 'update']);
        Route::delete('/api/{id}', [\App\Http\Controllers\Product\ProductController::class, 'destroy']);
    });
    //庫存
    Route::prefix('inventory')->group(function() {
        Route::get('/api', [\App\Http\Controllers\Inventory\InventoryController::class, 'index']);
        Route::post('/api', [\App\Http\Controllers\Inventory\InventoryController::class, 'store']);
    });

    //訂單
    Route::prefix('order')->group(function() {
        Route::get('/api', [\App\Http\Controllers\Order\OrderController::class, 'index']);
        Route::post('/api', [\App\Http\Controllers\Order\OrderController::class, 'store']);
        Route::get('/api/{id}', [\App\Http\Controllers\Order\OrderController::class, 'show']);
        Route::put('/api/{id}', [\App\Http\Controllers\Order\OrderController::class, 'update']);
    });

    //聯絡我們
    Route::prefix('contact')->group(function() {
        Route::get('/api', [\App\Http\Controllers\Contact\ContactController::class, 'index']);
    });

    //sign
    Route::prefix('sign')->group(function() {
        Route::post('/api/login', [\App\Http\Controllers\Sign\SignController::class, 'login']);
        Route::post('/api/logout', [\App\Http\Controllers\Sign\SignController::class, 'logout']);
    });
});

//CKEditor Image Upload
Route::post('ckeditor/image_upload', [\App\Http\Controllers\CKEditorController::class, 'upload']);
//ImageUpload
Route::post('/image/image_upload', [\App\Http\Controllers\ImageUploadController::class, 'upload']);
//captcha
Route::post('/captcha', [\App\Http\Controllers\Sign\SignController::class, 'captcha']);