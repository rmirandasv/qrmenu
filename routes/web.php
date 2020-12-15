<?php

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

use App\Http\Controllers\LoginController;
use App\Models\User;
use App\Mail\EmailVerification;


Route::view('/', 'index');

Route::get('/verify/email', [LoginController::class, 'verifyEmail'])
    ->name('auth.email.verification');

route::get('/email', function() {
    $user = User::find(1);

    return new EmailVerification($user);
});

Route::get('/logout', function() {

    \Auth::logout();
    return 'done';

});