<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;




Route::get('/',[HomeController::class,'index'])->name('principal')->middleware(['redirect.admin','isAuth']);
Route::get('/register',[RegisterController::class,'index'])->name('register');
Route::get('/login',[LoginController::class,'index'])->name('login');


//Admin
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin');
    Route::get('/admin/menus', [MenuController::class, 'index'])->name('menus.index');
    Route::get('/admin/create-menu', [MenuController::class, 'create'])->name('menus.create');
    Route::get('/admin/menu/{menu}', [MenuController::class, 'edit'])->name('menus.edit');
    Route::get('/admin/pedidos', [PedidoController::class, 'pedidosAdmin'])->name('pedidos.admin');
    Route::put('/admin/pedidos/{pedido}', [PedidoController::class, 'update'])->name('pedidos.update');
});

Route::middleware(['auth'])->group(function () {
    
    Route::get('/logout',[LoginController::class,'logout'])->name('logout');
    Route::get('/inicio',[MenuController::class,'indexUser'])->name('inicio');
    Route::get('/{user:name}/pedidos',[PedidoController::class,'index'])->name('pedidos');
    Route::get('/notifications',[NotificationController::class,'index'])->name('notifications');
});