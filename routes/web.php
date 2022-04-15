<?php

use Illuminate\Support\Facades\Route;
use GuzzleHttp\Middleware;

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
// ->middleware('auth:customer')
Route::get('/', [App\Http\Controllers\IndexController::class, 'index']);

Auth::routes();
Route::group(['middleware' => ['web','admin']], function(){

    Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
    Route::resource('profile', App\Http\Controllers\Dashboard\ProfileController::class)->except('show');
    Route::resource('job', App\Http\Controllers\Dashboard\JobController::class)->except('show');
    Route::get('job-active/{active}', [App\Http\Controllers\Dashboard\JobController::class, 'getByStatus'])->name('job-active');
    Route::get('change-status/{id}', [App\Http\Controllers\Dashboard\JobController::class, 'changeStatus'])->name('change-status');
    Route::resource('commpany', App\Http\Controllers\Dashboard\CommpanyController::class);
    Route::get('commpany-active/{id}', [App\Http\Controllers\Dashboard\CommpanyController::class, 'active'])->name('commpany-active');    
    Route::get('commpany-not-active', [App\Http\Controllers\Dashboard\CommpanyController::class, 'getByNotActive'])->name('commpany-not-active');    

});

Route::resource('users',App\Http\Controllers\UsersController::class)->except('show');
Route::resource('job-customer',App\Http\Controllers\Users\UserJobController::class)->except('show');
Route::get('all-job', [App\Http\Controllers\Users\UserJobController::class, 'getAllJobs'])->name('all-job');

Route::get('job-detail/{id}', [App\Http\Controllers\Users\jobDetailController::class, 'jobDetail'])->name('job-detail');
Route::post('intery-job', [App\Http\Controllers\Users\jobDetailController::class, 'store'])->name('intery-job');
Route::get('all-intery-job', [App\Http\Controllers\Users\jobDetailController::class, 'show'])->name('all-intery-job');
Route::get('dwonload/{id}', [App\Http\Controllers\Users\jobDetailController::class, 'download'])->name('dwonload');
Route::get('destroy/{id}', [App\Http\Controllers\Users\jobDetailController::class, 'destroy'])->name('destroy');
Route::post('entery-job', [App\Http\Controllers\Users\jobDetailController::class, 'store'])->name('intery-job');

Route::resource('profile',App\Http\Controllers\Users\UserProfileController::class)->except('show');
Route::post('single-store', [App\Http\Controllers\Users\UserJobController::class, 'singleStore'])->name('single-store');
Route::get('active-job/{active}', [App\Http\Controllers\Users\UserJobController::class, 'getByStatus'])->name('active-job');

Route::post('all-job', [App\Http\Controllers\Users\SearchController::class, 'search'])->name('search');


// Route::get('/{page}', 'App\Http\Controllers\AdminController@index');































// <div class="small-link">
// <a href="/" class="nav-item nav-link"> العودة الي القائمة الرئيسية </a>
// </div>



// <div class="small-link">
// <a href="{{ route('login') }}" class="nav-item nav-link">الدخول</a>
// </div>


// <div class="small-link">
// <a class="nav-item nav-link" href="{{ route('register') }}">تسجيل</a>
// </div>
