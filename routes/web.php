<?php

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\CarModelController;
use App\Http\Controllers\Client\ServicesController;
use App\Http\Controllers\CarVersionController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\RolePermissionController;
use App\Http\Controllers\Client\HomeController;

Route::get('/', [HomeController::class, 'index'])->name('home');

// Route::get('/car-listings', function () {
//     return view('client.pages.car-listings');
// })->name('car-listings');

Route::get('/service-listings', function () {
    return view('client.pages.service-listings');
})->name('service-listings');

Route::get('/contact-us', function () {
    return view('client.pages.contact-us');
})->name('contact-us');

// Route::get('/service-details', function () {
//     return view('client.pages.service-details');
// })->name('service-details');

Route::get('/custom-service-request', function () {
    return view('client.pages.custom-service-request');
})->name('custom-service-request');

// Route::get('/car-details', function () {
//     return view('client.pages.car-details');
// })->name('car-details');

Route::get('/about-us', function () {
    return view('client.pages.about-us');
})->name('about-us');



Route::get('/find-your-engine', function () {
    return view('client.pages.find-your-engine');
})->name('find-your-engine');

Route::get('/faq', function () {
    return view('client.pages.faq');
})->name('faq');


 Route::get('/car-details/{id}', [HomeController::class, 'carDetails'])->name('car.details');
Route::get('/cars-list', [HomeController::class, 'allCars'])->name('cars.list');
// Route::get('/services', [ServicesController::class, 'services'])->name('services');
// Route::get('/serviceDetail', [ServicesController::class, 'serviceDetail'])->name('serviceDetail');
// Route::get('/reviews', [ServicesController::class, 'reviews'])->name('reviews');
// Route::post('/reviews', [ServicesController::class, 'storeReview'])->name('reviews.store');


Route::get('/get-models/{brandId}', [HomeController::class, 'getModels'])->name('get.models');
Route::get('/get-versions/{modelId}', [HomeController::class, 'getVersions'])->name('get.versions');

// Route::get('/cars/{id}', fn($id) => view('guest.car-details'))->name('cars.show');
// Route::get('/dealers', fn() => view('guest.dealers-list'))->name('dealers.list');
// Route::get('/dealer/{id}', fn($id) => view('guest.dealer-profile'))->name('dealer.profile');

// Route::get('/contact-us', [ContactController::class, 'show'])->name('contact-us');
// Route::post('/contact-us', [ContactController::class, 'store'])->name('contact.store');

// Route::get('/blog/{slug}',[BlogController::class, 'showBlog'])->name('blogs.show');
// Route::get('/blogs', [BlogController::class, 'show'])->name('blogs');
// Route::get('/wishlist', [HomeController::class, 'wishlist'])->name('wishlist');
// Route::post('/api/wishlist-cars', [HomeController::class, 'getWishlistCars'])->name('api.wishlist.cars');
// Route::post('/api/wishlist-cars-html', [HomeController::class, 'getWishlistCarsHtml'])->name('api.wishlist.cars.html');


Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', function () {
        $user = auth()->user();
        if ($user->hasRole('admin')) {
            return redirect()->route('admin.dashboard');
        } elseif ($user->hasRole('dealer')) {
            return view('dealer.dashboard');
        } else {
            return view('client.home');
        }
    })->name('dashboard');

});



require __DIR__ . '/admin_tools.php';
// require __DIR__ . '/dealer.php';
require __DIR__ . '/admin.php';
