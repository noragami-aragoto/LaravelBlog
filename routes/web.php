<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Blog\PostController;
use App\Http\Controllers\Blog\Admin\CategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for yosur application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Route::get('/', function () {
    return view('index');
});

Route::group(['prefix' => 'admin/blog'], function () {
    $methods = ['index', 'edit', 'store', 'update', 'create'];
    Route::resource('categories', CategoryController::class)
        ->only($methods)
        ->names('blog.admin.categories');
});

Route::group(['prefix' => 'blog'], function () {
    Route::resource('posts', PostController::class);
});

require __DIR__ . '/auth.php';
