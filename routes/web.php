<?php

use App\Http\Controllers\HomeController;
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



Route::get('/login', function () {
    return view('pages.login');
})->name('login');

Route::get('/loggedIn',  [HomeController::class, 'login'])->name('loggedIn');
Route::group(['middleware' => 'auth'], function () {
Route::get('/email-template',  [HomeController::class, 'emailTemplate'])->name('email-template');
Route::get('/emailTemplate-list',  [HomeController::class, 'emailTemplateList'])->name('email-template-list');
Route::post('/createTemplate',  [HomeController::class, 'createTemplate'])->name('createTemplate');
});