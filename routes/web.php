<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TenantController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ValidaMultiTenant;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\VerifyUserTenant;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    Route::middleware(['verified', VerifyUserTenant::class])->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

        Route::prefix('admin')->name('admin.')->group(function () {
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

            Route::resource('documentos', PostController::class)
                ->only(
                    ['index', 'create', 'store', 'show', 'edit', 'update', 'destroy']
                )->names(
                    [
                        'index' => 'documentos.index',
                        'create' => 'documentos.create',
                        'store' => 'documentos.store',
                        'show' => 'documentos.show',
                        'edit' => 'documentos.edit',
                        'update' => 'documentos.update',
                        'destroy' => 'documentos.destroy',
                    ]
                );



            Route::resource('clientes', TenantController::class)
                ->only(
                    ['index', 'create', 'store', 'show', 'edit', 'update', 'destroy']
                )->names(
                    [
                        'index' => 'clientes.index',
                        'create' => 'clientes.create',
                        'store' => 'clientes.store',
                        'show' => 'clientes.show',
                        'edit' => 'clientes.edit',
                        'update' => 'clientes.update',
                        'destroy' => 'clientes.destroy',
                    ]
                );

            Route::resource('usuarios', UserController::class)
                ->only(
                    ['index', 'create', 'store', 'show', 'edit', 'update', 'destroy']
                )->names(
                    [
                        'index' => 'usuarios.index',
                        'create' => 'usuarios.create',
                        'store' => 'usuarios.store',
                        'show' => 'usuarios.show',
                        'edit' => 'usuarios.edit',
                        'update' => 'usuarios.update',
                        'destroy' => 'usuarios.destroy',
                    ]
                );
        });
    });

    Route::get('documentos', [PostController::class, 'showAll'])->name('documentos.showall');
    Route::get('documento/{slug}', [PostController::class, 'show'])->name('documento.show');

    Route::get('documentos/categoria/{category_id}', [PostController::class, 'showAll'])->name('documentos.showallByCategory');

    // Route::get('documento/categoria/{category_id}', [PostController::class, 'getByCategory'])->name('documentos.getByCategory');
});


Route::get('get-users', [ValidaMultiTenant::class, 'getAllUsers'])->name('get.users');
Route::get('get-permissions', [ValidaMultiTenant::class, 'getAllPermissions'])->name('get.permissions');
Route::get('get-tenants', [ValidaMultiTenant::class, 'getAllTenants'])->name('get.tensnts');
Route::get('get-category', [ValidaMultiTenant::class, 'getCategory']);
Route::get('get-posts', [ValidaMultiTenant::class, 'getPosts']);

require __DIR__ . '/auth.php';
