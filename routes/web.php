<?php

use App\Http\Controllers\AuthController;
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
    return view('signup');
});
Route::get('/index', function () {
    return view('index');
});
Route::get('/menu', function () {
    return view('menu');
});
Route::get('/about', function () {
    return view('about');
});

Route::get('/about', function () {
    return view('about');
});
Route::get('/book', function () {
    return view('book');
});
Route::get('/profile', function () {
    return view('profile');
});
Route::get('/login', function () {
    return view('login');
});

Route::get('/error', function () {
    return view('error');
});
Route::group([], function () {

    Route::get('/start1', function () {
        return view('bubbleShooterGame.start');
    });

    Route::get('/start2', function () {
        return view('doodleJumpMaster.index');
    });

    Route::get('/start3', function () {
        return view('chessMaster.index');
    });

    Route::get('/start4', function () {
        return view('egypt.start');
    });
});



Route::group(['prefix' => 'chess'], function () {

    Route::get('/player_computer', function () {
        return view('chessMaster.player_computer');
    });
    Route::get('/two_player', function () {
        return view('chessMaster.two_player');
    });
});



Route::group(['prefix' => 'egypt'], function () {

    Route::get('/game', function () {
        return view('egypt.index');
    });
});


Route::group(['prefix' => 'game1'], function () {

    Route::get('/level', function () {
        return view('bubbleShooterGame.level');
    });
    Route::get('/bubble-shooter', function () {
        return view('bubbleShooterGame.bubbleShooter');
    });

    Route::get('/bubble2', function () {
        return view('bubbleShooterGame.bubble2');
    });
    Route::get('/bubble3', function () {
        return view('bubbleShooterGame.bubble3');
    });
    Route::get('/bubble4', function () {
        return view('bubbleShooterGame.bubble4');
    });
    Route::get('/bubble5', function () {
        return view('bubbleShooterGame.bubble5');
    });
    Route::get('/bubble6', function () {
        return view('bubbleShooterGame.bubble6');
    });
    Route::get('/bubble7', function () {
        return view('bubbleShooterGame.bubble7');
    });
    Route::get('/bubble8', function () {
        return view('bubbleShooterGame.bubble8');
    });
    Route::get('/level9', function () {
        return view('bubbleShooterGame.bubbleShooter');
    });
    Route::get('/end', function () {
        return view('bubbleShooterGame.end');
    });
});


Route::get('/bubble-shooter', function () {
    return view('bubbleShooterGame.bubbleShooter');
});



Route::post('/signup', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
