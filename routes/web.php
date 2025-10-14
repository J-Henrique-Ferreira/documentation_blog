<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ValidaMultiTenant;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\VerifyUserTenant;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified', VerifyUserTenant::class])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    // Route::resource('categories', [CategoryController::class, '']);

    Route::resource('categorias', CategoryController::class)
        ->only(
            ['index', 'store', 'create', 'edit', 'update', 'destroy']
        )->names([
                'index' => 'admin.categorias.index',
                'store' => 'admin.categorias.store',
                'create' => 'admin.categorias.create',
                'edit' => 'admin.categorias.edit',
                'update' => 'admin.categorias.update',
                'destroy' => 'admin.categorias.destroy',
            ]);
});


Route::get('get-users', [ValidaMultiTenant::class, 'getAllUsers'])->name('get.users');
Route::get('get-permissions', [ValidaMultiTenant::class, 'getAllPermissions'])->name('get.permissions');
Route::get('get-tenants', [ValidaMultiTenant::class, 'getAllTenants'])->name('get.tensnts');
require __DIR__ . '/auth.php';
