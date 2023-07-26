<?php
/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register Admin routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "admin" middleware group. Enjoy building your Admin!
|
*/


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\User\UserController;
use App\Http\Controllers\Admin\MenueController;

Route::get('/test', [MenueController::class, 'getMenu'])->name('getMenu');


Route::prefix('auth')
    ->group(function () {
        Route::get('/', function () {
            return redirect()->route('admin-login');
        });
        Route::get('/login', [LoginController::class, 'login'])->name('login');
        Route::get('/logOut', [LoginController::class, 'onLogOut'])->name('logOut');
        Route::POST('/Onlogin', [LoginController::class, 'onLogin'])->name('onLogin');

    });


Route::middleware(['AdminGuard'])
    ->group(function () {

        Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

        Route::prefix('user')
            ->name('user-')
            ->group(function () {
                Route::get('/lists', [UserController::class, 'index'])->name('lists');
                Route::get('/role', [UserController::class, 'role'])->name('role');
                Route::get('create', [UserController::class, 'create'])->name('create');
                Route::get('edit/{id?}', [UserController::class, 'create'])->name('edit');
                Route::post('save/{id?}', [UserController::class, 'save'])->name('oncreate');
                Route::delete('delete/{id?}', [UserController::class, 'destroy'])->name('destroy');
                Route::get('permission/{id}', [UserController::class, 'setPermission'])->name('permission');
                Route::post('save-permission/{id}', [UserController::class, 'savePermission'])->name('save-permission');
            });

});
