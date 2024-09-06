<?php

use App\Http\Controllers\Auth\SocialAuthController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('login', [SocialAuthController::class, 'showForm'])->name('showForm');

Route::get('auth/google',[SocialAuthController::class, 'redirectToGoogle']);
Route::get('auth/google/callback',[SocialAuthController::class, 'handleGoogleCallback']);
Route::get('dashboard', [SocialAuthController::class, 'showDashboard']);


Route::get('auth/github', [SocialAuthController::class, 'redirectToGitHub']);
Route::get('auth/github/callback', [SocialAuthController::class, 'handleGitHubCallback']);
Route::get('dashbordforgithubusers', [SocialAuthController::class, 'showgitdashbord']);