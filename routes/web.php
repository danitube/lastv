<?php

use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PubgController;
use App\Http\Controllers\TiktokController;
use App\Http\Controllers\SettingController;
use App\Http\Livewire\Admin\Role\RoleIndex;
use App\Http\Livewire\Admin\User\UserIndex;
use App\Http\Controllers\FreefireController;
use App\Http\Controllers\VodafoneController;
use App\Http\Controllers\PubgguessController;
use App\Http\Livewire\Admin\Admin\AdminIndex;
use App\Http\Controllers\VodafoneguessesController;
use App\Http\Controllers\FreefireguessController;

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


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
/*
|--------------------------------------------------------------------------
| For Admin Panel Route
|--------------------------------------------------------------------------
*/
Route::middleware(['auth','admin'])->prefix('admin')->as('admin.')->group(function () {
    Route::get('/',AdminIndex::class)->name('index');
    Route::get('/user',UserIndex::class)->name('user.index')->can('viewAny', User::class);
    Route::get('/role',RoleIndex::class)->name('role.index')->can('viewAny', Role::class);
});
/*
|--------------------------------------------------------------------------
| For Settings Route
|--------------------------------------------------------------------------
*/
Route::get('/', [SettingController::class,'index']);
Route::get('/giveaway', [SettingController::class,'giveaway']);
Route::get('/code', [SettingController::class,'code']);
/*
|--------------------------------------------------------------------------
| For Pubg Route
|--------------------------------------------------------------------------
*/
Route::get('pubg', [PubgController::class,'index']);
Route::post('pubg/create', [PubgController::class,'create'])->name('pubgcreate');
Route::get('pubgsearch', [PubgController::class,'pubgsearch'])->name('pubgsearch');
Route::get('allsearch', [PubgController::class,'allsearch'])->name('allsearch');
Route::post('pubg/getsearchidpubg', [PubgController::class,'getsearchidpubg'])->name('getsearchidpubg');
Route::get('pubgwinners', [PubgController::class,'pubgwinners'])->name('pubgwinners');
Route::get('allmembers', [PubgController::class,'allmembers'])->name('allmembers');
Route::get('pubgmembers', [PubgController::class,'pubgmembers'])->name('pubgmembers');
/*
|--------------------------------------------------------------------------
| For Pages Route
|--------------------------------------------------------------------------
*/
Route::get('qanda', [PageController::class,'qanda'])->name('qanda');
Route::get('donation', [PageController::class,'donation'])->name('donation');
Route::get('privacy', [PageController::class,'privacy'])->name('privacy');
Route::get('about', [PageController::class,'about'])->name('about');
/*
|--------------------------------------------------------------------------
| For TikTok Route
|--------------------------------------------------------------------------
*/
Route::get('winners', [TiktokController::class,'allwinners'])->name('allwinners');
Route::post('getsearchidtiktok', [TiktokController::class,'getsearchidtiktok'])->name('getsearchidtiktok');
Route::get('tiktoksearch', [TiktokController::class,'tiktoksearch'])->name('tiktoksearch');
Route::get('tiktok', [TiktokController::class,'index']);
Route::post('tiktok/create', [TiktokController::class,'create'])->name('tiktokcreate');
Route::get('tiktokmembers', [TiktokController::class,'tiktokmembers'])->name('tiktokmembers');
/*
|--------------------------------------------------------------------------
| For Vodafone Route
|--------------------------------------------------------------------------
*/
Route::get('vodafone', [VodafoneController::class,'index']);
Route::post('vodafone/create', [VodafoneController::class,'create'])->name('vodcreate');
Route::get('vodsearch', [VodafoneController::class,'vodsearch'])->name('vodsearch');
Route::post('vodafone/getsearchidvod', [VodafoneController::class,'getsearchidvod'])->name('getsearchidvod');
Route::get('vodwinners', [VodafoneController::class,'vodwinners'])->name('vodwinners');
Route::get('vodmembers', [VodafoneController::class,'vodmembers'])->name('vodmembers');
/*
|--------------------------------------------------------------------------
| For Guesses Pubg Route
|--------------------------------------------------------------------------
*/
Route::get('pubgguess', [PubgguessController::class,'index'])->name('pubgguess');
Route::post('guesscreate', [PubgguessController::class,'create'])->name('guesscreate');
Route::post('createwinnerp', [PubgguessController::class,'createwinnerp'])->name('createwinnerp');
/*
|--------------------------------------------------------------------------
| For Guesses FreeFire Route
|--------------------------------------------------------------------------
*/
Route::get('freefireguess', [FreefireguessController::class,'index'])->name('freefireguess');
Route::post('guessfreefire', [FreefireguessController::class,'createidfire'])->name('guessfreefire');
Route::post('createwinnerf', [FreefireguessController::class,'createwinnerf'])->name('createwinnerf');/*
|--------------------------------------------------------------------------
| For Guesses Vodafone Route
|--------------------------------------------------------------------------
*/
Route::get('vodafoneguess', [VodafoneguessesController::class,'index'])->name('vodafoneguess');
Route::post('guessvodafone', [VodafoneguessesController::class,'createidvod'])->name('guessvodafone');
Route::post('createwinnerv', [VodafoneguessesController::class,'createwinnerv'])->name('createwinnerv');
