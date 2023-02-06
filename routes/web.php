<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BidController;

use App\Http\Livewire\Counter;

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

Route::get('/profile', [ProfileController::class, 'profilePages'])->name('profile');
Route::post('/profiles', [ProfileController::class, 'updateProfile'])->name('update-profile');


Route::middleware("role:admin|officer")->group(function(){
    Route::get('/form', [MainController::class, 'formPages'])->name('form');
    Route::post('/form-send', [MainController::class, 'formPagesSend'])->name('form-send');
    Route::post('/postingan-details-update/{id}', [MainController::class, 'postinganDetailsUpdate'])->name('postingan-details-update');
    Route::get('/delete-postingan/{id}', [MainController::class, 'deletePostingan'])->name('delete-postingan');
    Route::get('/account-pages', [MainController::class, 'accountListPages'])->name('account');
    Route::post('/add-account', [MainController::class, 'addAccount'])->name('add-account');
    Route::get('/list-item', [MainController::class, 'listItem'])->name('list-item');
    Route::post('/send-message/{id}', [MainController::class, 'sendMessage'])->name('send-message');
    Route::get('/stat', function(){
        return view('pages/stat');
    })->name('stat');
});


Route::get('/history', [MainController::class, 'history'])->name('history');
Route::get('/postingan-details/{id}', [MainController::class, 'postinganDetails'])->name('postingan-details');
Route::get('/inbox', [MainController::class, 'inbox'])->name('inbox');
Route::get('/inbox-details/{id}', [MainController::class, 'getInboxDetails'])->name('get-inbox-details');
Route::post('/inbox-send/{id}/{inbox_id}', [MainController::class, 'inboxReply'])->name('inbox-send');
Route::get('/search', [MainController::class, 'search'])->name('search');
Route::post('/bid-send/{id}', [BidController::class, 'sendBid'])->name('send-bid');
Route::get('/get-bid-data-details/{id}', [BidController::class, 'getBidDataDetails'])->name('get-bid-data-details');




// Perintilan
Route::get('/logout', [App\Http\Controllers\HomeController::class, 'perform'])->name('perform-logout');
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/test', [MainController::class, 'test']);
Route::get('/test/testtt', [Counter::class, 'render']);
