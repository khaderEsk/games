<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\GovernorController;

Route::get('/', [AuthenticatedSessionController::class, 'create']);
Route::post('/login', [AuthenticatedSessionController::class, 'store']);

Route::get('/signup', [RegisteredUserController::class, 'create'])->name('signup');
Route::post('/signup', [RegisteredUserController::class, 'store']);


Route::middleware(['auth'])->group(function () {

    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
    Route::controller(DashboardController::class)->group(function () {
        Route::get('/index', 'index')->name('index');
        Route::get('/menu', 'menu')->name('menu');
        Route::get('/about', 'about')->name('about');
        Route::get('/book', 'book')->name('book');
        Route::get('/withdraw', 'withdraw')->name('withdraw');
        Route::get('/profile', 'profile')->name('profile');
        Route::post('/updateProfile', 'updateProfile')->name('updateProfile');
    });
    Route::controller(AdminController::class)->group(function () {
        Route::get('/indexAdmin', 'index')->name('indexAdmin');
        Route::get('/allUser', 'allUser')->name('allUser');
        Route::get('/settings', 'settings')->name('settings');
        Route::get('/addCategory', 'addCategory')->name('addCategory');
        Route::get('/addSlide', 'addSlide')->name('addSlide');
        Route::get('/categories', 'categories')->name('categories');
        Route::get('/games', 'games')->name('games');
        Route::get('/slider', 'slider')->name('slider');
        Route::get('/accept/{id}', 'accept')->name('accept');
        Route::get('/transfer', 'transfer')->name('transfer');
        Route::get('/transfer-details/{id}', 'transferDetails')->name('transferDetails');
        Route::post('/update', 'update')->name('update');
    });
    Route::controller(GameController::class)->group(function () {
        Route::get('/HorseRaceAds/{user}', 'HorseRaceAds');
        Route::post('/update-funds', 'endHorseRaceAds');
        Route::get('/boxStackingAds/{user}', 'boxStackingAds');
        Route::post('/update-stacking', 'endBoxStacking');
        Route::get('/XOStart/{user}', 'XOStart');
        Route::get('/breakoutAds/{user}', 'breakoutAds');
        Route::get('/puzzle/{user}', 'puzzle');
        Route::get('/TronMasterAds/{user}', 'TronMasterAds');
        Route::get('/avoidDebris/{user}', 'avoidDebris');
        Route::get('/hit-hedgehog/{user}', 'hitHedgehog');
        Route::get('/chess/{user}', 'chess');
        Route::get('/player_computer/{user}', 'chess_player_computer');
        Route::get('/two_player/{user}', 'chess_two_player');
    });
    Route::post('/governorStore', [GovernorController::class, 'store'])->name('governorStore');
});
