<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\Admin\SizeController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Agent\AgentController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SubCategoryController;


/*
|--------------------------------------------------------------------------
| FRONTEND
|--------------------------------------------------------------------------
*/

Route::get('/', [FrontendController::class, 'index']);
Route::get('/about-us', [FrontendController::class, 'aboutUs'])->name('about-us');
Route::get('/contact-us', [FrontendController::class, 'contactUs'])->name('contact-us');
Route::get('/services', [FrontendController::class, 'services'])->name('services');
Route::get('/shop', [FrontendController::class, 'shop'])->name('shop');
Route::get('/blog', [FrontendController::class, 'blog'])->name('blog');


// E-Commerce
Route::get('/cart', [FrontendController::class, 'cart'])->middleware(['auth', 'verified'])->name('cart');
Route::get('/checkout', [FrontendController::class, 'checkout'])->middleware(['auth', 'verified'])->name('checkout');
Route::get('/thank-you', [FrontendController::class, 'thankYou'])->middleware(['auth', 'verified'])->name('thank-you');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';



/*
|--------------------------------------------------------------------------
|  BACKEND | Admin Sectiion
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [DashboardController::class, 'adminDashboard'])->name('admin.dashboard');
    Route::post('/admin/logout',   [DashboardController::class, 'adminLogout'])->name('admin.logout');

        // Category
        Route::resource('/admin/category', CategoryController::class);

        // Sub Category
        Route::resource('/admin/sub-category', SubCategoryController::class);

        // Brand
        Route::resource('/admin/brand', BrandController::class);

        // Size
        Route::resource('/admin/size', SizeController::class);

        // Color
        Route::resource('/admin/color', ColorController::class);
});





/*
|--------------------------------------------------------------------------
|  BACKEND | Agent Section
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:agent'])->group(function () {
    Route::get('/agent/dashboard', [AgentController::class, 'agentDashboard'])->name('agent.dashboard');
});


