<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BatchChickenController;
use App\Http\Controllers\BatchEggsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserChicken;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserEgg;
use App\Models\BatchEggs;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';


///ADMIND DASHBOARD
Route::middleware(['auth', 'roles:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');
    Route::get('/admin/logout', [AdminController::class, 'AdminLogout'])->name('admin.logout');

    /// CHICKEN BATCHES
    Route::get('/admin/batches', [BatchChickenController::class, 'index'])->name('admin.batches');

    Route::post('/admin/batches/store', [BatchChickenController::class, 'store'])->name('admin.batches.store');

    // Update Route
    Route::put('/admin/batches/{batch}', [BatchChickenController::class, 'update'])->name('admin.batches.update');

    // Destroy Route
    Route::delete('/admin/batches/{batch}', [BatchChickenController::class, 'destroy'])->name('admin.batches.destroy');

    
    ////EGGS BATCHES
    Route::get('/admin/eggs', [BatchEggsController::class, 'index'])->name('admin.eggs');

    Route::post('/batches/eggs/store', [BatchEggsController::class, 'store'])->name('batches.eggs.store');
    
    Route::put('/batches/eggs/{id}', [BatchEggsController::class, 'update'])->name('batches.eggs.update');

    Route::delete('/batches/eggs/{id}', [BatchEggsController::class, 'destroy'])->name('batches.eggs.destroy');




});//END ADMIN GROUP

//ADMIN LOGIN
Route::get('/admin/login', [AdminController::class, 'AdminLogin'])->name('admin.login');


/// USER DASHBOARD
Route::middleware(['auth', 'roles:user'])->group(function () {
    Route::get('/user/dashboard', [UserController::class, 'UserDashboard'])->name('user.dashboard');
    Route::get('/user/logout', [UserController::class, 'UserLogout'])->name('user.logout');
    ///CHICKEN ROUTE
    Route::get('/user/chicken',[UserChicken::class,'index'])->name('user.chicken');

    Route::get('/chicken/details/{id}', [UserChicken::class, 'show'])->name('chicken.details');

    Route::post('/chicken/buy/{batch_id}', [UserChicken::class, 'store'])->name('chicken.buy');

    ///EGG ROUTE
    Route::get('/user/egg',[UserEgg::class,'index'])->name('user.egg');

    Route::get('/egg/details/{id}', [UserEgg::class, 'show'])->name('egg.details');

    Route::post('/egg/buy/{batch_id}', [UserEgg::class, 'store'])->name('egg.buy');

    ///HISTORY table route
    Route::get('/user/egg/history', [UserController::class, 'Egghistory'])->name('user.egg.history');
    Route::get('/user/chicken/history', [UserController::class, 'chickenhistory'])->name('user.chicken.history');



});//END USER GROUP
//USER LOGIN
Route::get('/user/login', [UserController::class, 'UserLogin'])->name('user.login');
