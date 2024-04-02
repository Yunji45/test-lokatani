<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Models\User;

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
    $title = "User";
    $user = User::orderBy('created_at','desc')->get();
    return view('page.index', compact('title','user'));
});
Route::resource('user',UserController::class);
// Route::get('/', function () {
//     return view('page.index');
// })->name('index');
