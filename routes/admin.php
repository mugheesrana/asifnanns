<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\CarModelController;
use App\Http\Controllers\CarVersionController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\RolePermissionController;

// // Prefix all admin routes with "admin"
// Route::prefix('admin')->name('admin.')->group(function () {
//     Route::get('/dashboard', fn () => view('admin.dashboard'))->name('dashboard');

//     // Dealers
//     Route::get('/dealers', fn () => view('admin.dealers.index'))->name('dealers.index');
//     Route::get('/dealers/{id}', fn ($id) => view('admin.dealers.show'))->name('dealers.show');

//     // Cars
//     Route::get('/cars', fn () => view('admin.cars.index'))->name('cars.index');
//     Route::get('/cars/{id}', fn ($id) => view('admin.cars.show'))->name('cars.show');

//     // Users - handled in web.php with RolePermissionController

//     // Reports
//     Route::get('/reports', fn () => view('admin.reports.index'))->name('reports.index');
// });

Route::middleware(['auth'])->group(function () {

    Route::middleware('role:admin')->prefix('admin')->name('admin.')->group(function () {
        // Admin Dashboard Route
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
        Route::get('/users', [RolePermissionController::class, 'index'])->name('users');
        Route::get('/users/create', [RolePermissionController::class, 'createUser'])->name('create');
        Route::post('/users/store', [RolePermissionController::class, 'storeUser'])->name('users.store');
        Route::get('/users/{user}/edit', [RolePermissionController::class, 'editUser'])->name('users.edit');
        Route::post('/users/update/{user}', [RolePermissionController::class, 'updateUser'])->name('users.update');
        Route::delete('/users/{user}', [RolePermissionController::class, 'destroyUser'])->name('users.destroy');

        Route::patch('/users/{user}/role', [RolePermissionController::class, 'updateUserRole'])->name('users.role');

        Route::get('/roles', [RolePermissionController::class, 'roles'])->name('roles');
        Route::post('/roles', [RolePermissionController::class, 'createRole'])->name('roles.create');
        Route::get('/roles/{role}/edit', [RolePermissionController::class, 'editRole'])->name('roles.edit');
        Route::put('/roles/{role}', [RolePermissionController::class, 'updateRole'])->name('roles.update');
        Route::delete('/roles/{role}', [RolePermissionController::class, 'destroyRole'])->name('roles.destroy');
        Route::patch('/roles/{role}/permissions', [RolePermissionController::class, 'assignPermissionToRole'])->name('roles.permissions');

        Route::get('/permissions', [RolePermissionController::class, 'permissions'])->name('permissions');
        Route::post('/permissions', [RolePermissionController::class, 'createPermission'])->name('permissions.create');
        Route::get('/permissions/{permission}/edit', [RolePermissionController::class, 'editPermission'])->name('permissions.edit');
        Route::put('/permissions/{permission}', [RolePermissionController::class, 'updatePermission'])->name('permissions.update');
        Route::delete('/permissions/{permission}', [RolePermissionController::class, 'destroyPermission'])->name('permissions.destroy');

        // Car management routes
        Route::get('/cars', [CarController::class, 'index'])->name('cars.index');
        Route::get('/cars/create', [CarController::class, 'create'])->name('cars.create');
        Route::post('/cars', [CarController::class, 'store'])->name('cars.store');
        Route::get('/cars/{car}', [CarController::class, 'show'])->name('cars.show');
        Route::get('/cars/{car}/edit', [CarController::class, 'edit'])->name('cars.edit');
        Route::put('/cars/{car}', [CarController::class, 'update'])->name('cars.update');
        Route::delete('/cars/{car}', [CarController::class, 'destroy'])->name('cars.destroy');

        Route::get('/get-models/{brandId}', [CarController::class, 'getModels'])->name('getModels');
        Route::get('/get-versions/{modelId}', [CarController::class, 'getVersions'])->name('getVersions');

        Route::get('/brands', [BrandController::class, 'index'])->name('brands.index');
        Route::post('brands', [BrandController::class, 'store'])->name('brands.store');
        Route::put('brands/{brand}', [BrandController::class, 'update'])->name('brands.update');
        Route::delete('brands/{brand}', [BrandController::class, 'destroy'])->name('brands.destroy');

        Route::resource('models', CarModelController::class);
        Route::resource('versions', CarVersionController::class)->except(['show']);

        // Route::get('/setting', [SettingController::class, 'index'])->name('setting');

        Route::get('/settings', [SettingController::class, 'index'])->name('settings');
        Route::post('/settings/update', [SettingController::class, 'update'])->name('settings.update');

        // Social Links CRUD
        Route::post('/social-links/store', [SettingController::class, 'store'])->name('social-links.store');
        Route::put('/social-links/{id}', [SettingController::class, 'updateSocailLink'])->name('social-links.update');
        Route::delete('/social-links/{id}', [SettingController::class, 'destroy'])->name('social-links.destroy');

        Route::get('blogs', [BlogController::class, 'index'])->name('blogs.index');
        Route::get('blogs/create', [BlogController::class, 'create'])->name('blogs.create');
        Route::post('blogs/store', [BlogController::class, 'store'])->name('blogs.store');
        Route::get('blogs/edit/{id}', [BlogController::class, 'edit'])->name('blogs.edit');
        Route::post('blogs/update/{id}', [BlogController::class, 'update'])->name('blogs.update');
        Route::delete('blogs/delete/{id}', [BlogController::class, 'destroy'])->name('blogs.destroy');

        // Dashboard API routes
        Route::get('/dashboard/stats', [AdminDashboardController::class, 'getStatsApi'])->name('dashboard.stats');
        Route::get('/dashboard/activity', [AdminDashboardController::class, 'getActivityApi'])->name('dashboard.activity');
    });
});
