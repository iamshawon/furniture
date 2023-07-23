<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Agent\AgentController;
use App\Http\Controllers\Admin\CategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', [FrontendController::class, 'index']);
Route::get('/shop', [FrontendController::class, 'shop'])->name('shop');
Route::get('/about-us', [FrontendController::class, 'aboutUs'])->name('about-us');
Route::get('/services', [FrontendController::class, 'services'])->name('services');
Route::get('/blog', [FrontendController::class, 'blog'])->name('blog');
Route::get('/contact-us', [FrontendController::class, 'contactUs'])->name('contact-us');

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


// Admin
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'adminDashboard'])->name('admin.dashboard');
    Route::post('/admin/logout',   [AdminController::class, 'adminLogout'])->name('admin.logout');

        // Category
        Route::resource('/admin/category', CategoryController::class);
});



// Agent
Route::middleware(['auth', 'role:agent'])->group(function () {
    Route::get('/agent/dashboard', [AgentController::class, 'agentDashboard'])->name('agent.dashboard');
});





/*
|--------------------------------------------------------------------------
|  ROUTES
|--------------------------------------------------------------------------
*/
