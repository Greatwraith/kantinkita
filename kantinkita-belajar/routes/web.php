<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\UserMenuController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\RiwayatTransaksiController;
use App\Http\Controllers\UlasanController;


// =========================
// PUBLIC ROUTES
// =========================
Route::get('/', fn() => view('welcome'));

Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/login', [UserController::class, 'logincheck'])->name('logincheck');


Route::get('/tentang-kami', function () {
    return view('user.tentangkita');
})->name('tentangkita');



// =========================
// ROUTES MEMBUTUHKAN LOGIN
// =========================
Route::middleware(['auth'])->group(function () {

    // Dashboard
    Route::get('/dashboard', [UserController::class, 'goDashboard'])->name('dashboard');
    Route::get('/logout', [UserController::class, 'logout'])->name('logout');


    // =========================
    // ADMIN SECTION
    // =========================
    Route::prefix('admin')->name('admin.')->group(function () {

        Route::get('/dashboard', [UserController::class, 'goDashboard'])->name('dashboard');

        Route::prefix('menu')->name('menu.')->group(function () {
            Route::get('/',           [MenuController::class, 'index'])->name('index');
            Route::get('/create',     [MenuController::class, 'create'])->name('create');
            Route::post('/',          [MenuController::class, 'store'])->name('store');
            Route::get('/{id}/edit',  [MenuController::class, 'edit'])->name('edit');
            Route::put('/{id}',       [MenuController::class, 'update'])->name('update');
            Route::delete('/{id}',    [MenuController::class, 'destroy'])->name('destroy');
            Route::get('/{id}',       [MenuController::class, 'show'])->name('show');
        });

        Route::prefix('pesanan')->name('pesanan.')->group(function () {
            Route::get('/',               [PesananController::class, 'adminIndex'])->name('index');
            Route::post('/{id}/complete', [PesananController::class, 'complete'])->name('complete');
            Route::post('/{id}/cancel',   [PesananController::class, 'adminCancel'])->name('cancel');
            Route::get('/{id}',           [PesananController::class, 'adminShow'])->name('show');
        });

        Route::get('/riwayat-transaksi', 
            [RiwayatTransaksiController::class, 'adminRiwayat']
        )->name('riwayat');

      Route::get('/profile', [UserController::class, 'adminProfile'])
    ->name('profile');


    });


    // =========================
    // USER SECTION
    // =========================

    Route::get('/menu', [UserMenuController::class, 'index'])->name('user.menu.index');

    Route::get('/menu/json/{id}', [UserMenuController::class, 'json'])
        ->name('user.menu.json');

    Route::get('/menu/{id}', [UserMenuController::class, 'show'])
        ->name('user.menu.show');

    Route::get('/user/profile', [UserController::class, 'profile'])
        ->name('user.profile');

    Route::prefix('cart')->name('user.cart.')->group(function () {
        Route::get('/',               [CartController::class, 'index'])->name('index');
        Route::post('/add/{id_menu}', [CartController::class, 'store'])->name('store');
        Route::get('/edit/{id}',      [CartController::class, 'edit'])->name('edit');
        Route::put('/{id}',           [CartController::class, 'update'])->name('update');
        Route::delete('/{id}',        [CartController::class, 'destroy'])->name('destroy');
        Route::put('/cart/update-all',[CartController::class, 'updateAll'])->name('updateAll');
    });

    Route::prefix('user/pesanan')->name('user.pesanan.')->group(function () {
        Route::get('/',     [PesananController::class, 'index'])->name('index');
        Route::get('/{id}', [PesananController::class, 'show'])->name('show');
        Route::post('/{id}/cancel', [PesananController::class, 'cancel'])->name('cancel');
    });

    Route::post('/checkout', [PesananController::class, 'checkout'])
        ->name('user.checkout');

    Route::prefix('ulasan')->name('ulasan.')->group(function () {
        Route::get('/',         [UlasanController::class, 'index'])->name('index');
        Route::get('/create',   [UlasanController::class, 'create'])->name('create');
        Route::post('/store',   [UlasanController::class, 'store'])->name('store');
        Route::get('/edit',     [UlasanController::class, 'edit'])->name('edit');
        Route::put('/update',   [UlasanController::class, 'update'])->name('update');
        Route::delete('/delete',[UlasanController::class, 'destroy'])->name('destroy');
    });

    Route::get('/featured-menu', [UserMenuController::class, 'featured'])
        ->name('featured.menu');


        
});
