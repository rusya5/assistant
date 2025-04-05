<?php

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

Route::get('/login', [\App\Http\Controllers\AuthController::class, 'index'])->name('login');
Route::group(['prefix' => '/admin'], function () {
    Route::get('/', [\App\Http\Controllers\Admin\AdminController::class, 'index'])->name('admin.index');
    Route::get('/new-bot', [\App\Http\Controllers\Admin\AdminController::class, 'createBot'])->name('admin.createBot');
    Route::get('/clear', [\App\Http\Controllers\Admin\AdminController::class, 'clear'])->name('admin.clear');
    Route::group(['prefix' => '/equipments-service'], function () {
        Route::get('/', [\App\Http\Controllers\Admin\EquipmentsServiceController::class, 'index'])->name('admin.equipments-service.index');
        Route::post('/', [\App\Http\Controllers\Admin\EquipmentsServiceController::class, 'store'])->name('admin.equipments-service.store');
        Route::put('/{id}', [\App\Http\Controllers\Admin\EquipmentsServiceController::class, 'update'])->name('admin.equipments-service.update');
        Route::delete('/{id}', [\App\Http\Controllers\Admin\EquipmentsServiceController::class, 'destroy'])->name('admin.equipments-service.destroy');

        Route::get('/bookings', [\App\Http\Controllers\Admin\EquipmentsServiceController::class, 'bookings'])->name('admin.equipments-service.bookings');
    });
    Route::group(['prefix' => '/chat'], function () {
        Route::get('/', [\App\Http\Controllers\Admin\ChatController::class, 'index'])->name('admin.chat.index');
        Route::get('/messages/{chat_id}', [\App\Http\Controllers\Admin\ChatController::class, 'messages'])->name('admin.chat.messages');
    });
    Route::group(['prefix' => '/prompt'], function () {
        Route::get('/', [\App\Http\Controllers\Admin\PromptController::class, 'index'])->name('admin.prompt.index');
        Route::put('/update', [\App\Http\Controllers\Admin\PromptController::class, 'update'])->name('admin.prompt.update');
    });
});
