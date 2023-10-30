<?php

use App\Events\DefaultEvent;
use App\Events\GroupEvent;
use App\Events\MessageSent;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\UserController;
use App\Models\Message;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\GroupController;
use Mockery\QuickDefinitionsConfiguration;


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



//---register routes--------
Route::get('register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->middleware('guest');

Route::get('login', [SessionController::class, 'create'])->middleware('guest');
Route::post('login', [SessionController::class, 'store'])->middleware('guest');
Route::get('logout', [SessionController::class, 'destroy'])->middleware('auth');


//-------
Route::get('/', [GroupController::class,'getUserChats']);
Route::get('/{chatname}', [ChatController::class, 'getChatMessages'])->name('chatname');
Route::get('/{chatname}/send', [UserController::class, 'sendMessage'])->name('send');


//-----------------test=-------
// Route::get('/test', function(Request $request) {
//     GroupEvent::dispatch('data');
//     return view('welcome');
// });
// Route::get('/test1', function(){
//     return view('welcome');
// });

