<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
use App\Http\Controllers\UserController;

Route::get('/users', [UserController::class, 'getUsers'])->name('users.getUsers');
Route::get('/users/{id}', [UserController::class, 'getUser'])->name('users.getUser');
Route::post('/users', [UserController::class, 'storeUser'])->name('users.storeUser');
Route::put('/users/{id}', [UserController::class, 'updateUser'])->name('users.updateUser');
Route::delete('/users/{id}', [UserController::class, 'deleteUser'])->name('users.deleteUser');

use App\Http\Controllers\QrmenuController;

Route::get('/users/{userId}/qrmenu', [QrmenuController::class, 'getUserMenu'])->name('qrmenus.getUserMenu');
Route::get('/qrmenus/{id}', [QrmenuController::class, 'getMenu'])->name('qrmenus.getMenu');
Route::post('/qrmenus', [QrmenuController::class, 'addMenu'])->name('qrmenus.addMenu');
Route::put('/qrmenus/{id}', [QrmenuController::class, 'updateMenu'])->name('qrmenus.updateMenu');
Route::delete('/qrmenus/{id}', [QrmenuController::class, 'deleteMenu'])->name('qrmenus.deleteMenu');

use App\Http\Controllers\QrmenuPageController;

Route::get('/qrmenus/{menuId}/pages', [QrmenuPageController::class, 'getMenuPages'])->name('qrmenupages.getMenuPages');
Route::get('/qrmenus/{menuId}/pages/{id}', [QrmenuPageController::class, 'getMenuPage'])->name('qrmenupages.getMenuPage');
Route::post('/qrmenus/{menuId}/pages', [QrmenuPageController::class, 'addMenuPage'])->name('qrmenupages.addMenuPage');
Route::put('/qrmenus/{menuId}/pages/{id}', [QrmenuPageController::class, 'updateMenuPage'])->name('qrmenupages.updateMenuPage');
Route::delete('/qrmenus/{menuId}/pages/{id}', [QrmenuPageController::class, 'deleteMenuPage'])->name('qrmenupages.deleteMenuPage');

use App\Http\Controllers\QrmenuPageItemController;

Route::get('/qrmenus/{menuId}/pages/{pageId}/items', [QrmenuPageItemController::class, 'getPageItems'])->name('qrmenupageitems.getPageItems');
Route::get('/qrmenus/{menuId}/pages/{pageId}/items/{id}', [QrmenuPageItemController::class, 'getPageItem'])->name('qrmenupageitems.getPageItem');
Route::post('/qrmenus/{menuId}/pages/{pageId}/items', [QrmenuPageItemController::class, 'addPageItem'])->name('qrmenupageitems.addPageMenu');
Route::put('/qrmenus/{menuId}/pages/{pageId}/items/{id}', [QrmenuPageItemController::class, 'updatePageItem'])->name('qrmenupageitems.update');
Route::delete('/qrmenus/{menuId}/pages/{pageId}/items/{id}', [QrmenuPageItemController::class, 'deletePageItem'])->name('qrmenupageitems.delete');
