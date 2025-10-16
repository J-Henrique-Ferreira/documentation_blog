<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ValidaMultiTenant;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\VerifyUserTenant;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'verified', VerifyUserTenant::class])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::prefix('admin')->name('admin.')->group(function () {

        Route::get('/documentos', function () {
            return view('pages.post.index');
        })->name('documentos');

        Route::resource('categorias', CategoryController::class)
            ->only(
                ['index', 'create', 'store', 'edit', 'update', 'destroy']
            )->names(
                [
                    'index' => 'categorias.index',
                    'store' => 'categorias.store',
                    'create' => 'categorias.create',
                    'edit' => 'categorias.edit',
                    'update' => 'categorias.update',
                    'destroy' => 'categorias.destroy',
                ]
            );

        Route::resource('posts', PostController::class)
            ->only(
                ['index', 'create', 'store', 'edit', 'update', 'destroy']
            )->names(
                [
                    'index' => 'posts.index',
                    'store' => 'posts.store',
                    'create' => 'posts.create',
                    'edit' => 'posts.edit',
                    'update' => 'posts.update',
                    'destroy' => 'posts.destroy',
                ]
            );
    });
});


Route::get('get-users', [ValidaMultiTenant::class, 'getAllUsers'])->name('get.users');
Route::get('get-permissions', [ValidaMultiTenant::class, 'getAllPermissions'])->name('get.permissions');
Route::get('get-tenants', [ValidaMultiTenant::class, 'getAllTenants'])->name('get.tensnts');
Route::get('get-category', [ValidaMultiTenant::class, 'getCategory']);
require __DIR__ . '/auth.php';
