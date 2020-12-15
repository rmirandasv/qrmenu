<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\QrmenuController;
use App\Http\Controllers\QrmenuPageController;
use App\Http\Controllers\QrmenuPageItemController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/login', [LoginController::class, 'login'])->name('auth.login');
Route::post('/logout', [LoginController::class, 'logout'])->name('auth.logout');
route::post('/session/check', [LoginController::class, 'checkSession'])->name('auth.checksession');

Route::post('/register', [UserController::class, 'register'])
        ->name('users.register');

Route::middleware(['auth:sanctum', 'verified'])->group(function () {

    Route::post('/upload/cover', [QrmenuController::class, 'uploadCover'])->name('qrmenus.uploadCover');

    // user resources
    Route::get('/users', [UserController::class, 'getUsers'])
        ->name('users.getUsers'); 
    Route::get('/users/{id}', [UserController::class, 'getUser'])
        ->name('users.getUser');
    
    Route::put('/users/{id}', [UserController::class, 'updateUser'])
        ->name('users.updateUser');

    // qrmenu resources
    Route::get('/users/{userId}/qrmenu', [QrmenuController::class, 'getUserMenu'])
        ->name('qrmenus.getUserMenu');
    Route::get('/qrmenus/{id}', [QrmenuController::class, 'getMenu'])
        ->name('qrmenus.getMenu');
    Route::post('/qrmenus', [QrmenuController::class, 'addMenu'])
        ->name('qrmenus.addMenu');
    Route::put('/qrmenus/{id}', [QrmenuController::class, 'updateMenu'])
        ->name('qrmenus.updateMenu');
    Route::delete('/qrmenus/{id}', [QrmenuController::class, 'deleteMenu'])
        ->name('qrmenus.deleteMenu');

    // menu pages
    Route::get('/qrmenus/{menuId}/pages', [QrmenuPageController::class, 'getMenuPages'])
        ->name('qrmenupages.getMenuPages');
    Route::get('/qrmenus/{menuId}/pages/{id}', [QrmenuPageController::class, 'getMenuPage'])
        ->name('qrmenupages.getMenuPage');
    Route::post('/qrmenus/{menuId}/pages', [QrmenuPageController::class, 'addMenuPage'])
        ->name('qrmenupages.addMenuPage');
    Route::put('/qrmenus/{menuId}/pages/{id}', [QrmenuPageController::class, 'updateMenuPage'])
        ->name('qrmenupages.updateMenuPage');
    Route::delete('/qrmenus/{menuId}/pages/{id}', [QrmenuPageController::class, 'deleteMenuPage'])
        ->name('qrmenupages.deleteMenuPage');

    // page items
    Route::get('/qrmenus/{menuId}/pages/{pageId}/items', [QrmenuPageItemController::class, 'getPageItems'])
        ->name('qrmenupageitems.getPageItems');
    Route::get('/qrmenus/{menuId}/pages/{pageId}/items/{id}', [QrmenuPageItemController::class, 'getPageItem'])
        ->name('qrmenupageitems.getPageItem');
    Route::post('/qrmenus/{menuId}/pages/{pageId}/items', [QrmenuPageItemController::class, 'addPageItem'])
        ->name('qrmenupageitems.addPageMenu');
    Route::put('/qrmenus/{menuId}/pages/{pageId}/items/{id}', [QrmenuPageItemController::class, 'updatePageItem'])
        ->name('qrmenupageitems.update');
    Route::delete('/qrmenus/{menuId}/pages/{pageId}/items/{id}', [QrmenuPageItemController::class, 'deletePageItem'])
        ->name('qrmenupageitems.delete');

});












