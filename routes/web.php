<?php

use Illuminate\Support\Facades\Route;
use App\Enums\RoleEnum;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\CarrierRegisterController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\Shipper\SubUserController;
use App\Http\Controllers\Backend\Shipper\AddressBookController;
use App\Http\Controllers\Backend\Carrier\CarrierSubUserController;
use App\Http\Controllers\Backend\Carrier\CarrierDocumentController;
use App\Http\Controllers\Backend\Carrier\TruckController;
use App\Http\Controllers\Backend\Carrier\DriverController;

// ---------------------------
// 🔐 Public Auth Routes
// ---------------------------

// Shipper Login
Route::post('/login', [RegisteredUserController::class, 'login'])->name('login');

// Carrier Register & Login
Route::prefix('carrier')->group(function () {
    Route::get('register', [CarrierRegisterController::class, 'carrierRegister'])->name('carrier.register');
    Route::post('register', [CarrierRegisterController::class, 'register']);

    Route::get('login', [CarrierRegisterController::class, 'carrierLogin'])->name('carrier.login');
    Route::post('login', [CarrierRegisterController::class, 'login']);
});


// ---------------------------
// 🔐 Authenticated Routes
// ---------------------------
Route::middleware(['auth'])->group(function () {

    // Redirect / to /home
    Route::get('/', fn () => to_route('home'));

    // Common Roles (Admin + Shipper + Carrier)
    Route::middleware(['role:' . RoleEnum::ADMIN->value . '|' . RoleEnum::SHIPPER->value . '|' . RoleEnum::CARRIER->value])
        ->group(function () {

        // Home Dashboard
        Route::get('/home', [HomeController::class, 'index'])->name('home');

        // Profile
        Route::controller(ProfileController::class)->group(function () {
            Route::get('/profile', 'list')->name('profile.list');
            Route::get('/profile/edit', 'edit')->name('profile.edit');
            Route::patch('/profile', 'update')->name('profile.update');
            Route::delete('/profile', 'destroy')->name('profile.destroy');
        });
    });

    // ---------------------------
    // 🚢 Shipper Routes
    // ---------------------------
    Route::prefix('shipper')->name('shipper.')->middleware(['role:' . RoleEnum::SHIPPER->value])->group(function () {

        // Sub Users
        Route::controller(SubUserController::class)->group(function () {
            Route::get('/sub-users', 'index')->name('sub-users');
            Route::get('/sub-users/create', 'create')->name('sub-users.create');
            Route::post('/sub-users', 'store')->name('sub-users.store');
            Route::get('/sub-users/{id}/edit', 'edit')->name('sub-users.edit');
            Route::get('/sub-users/{id}/show', 'show')->name('sub-users.show');
            Route::post('/sub-users/{id}', 'update')->name('sub-users.update');
            Route::delete('/sub-users/{id}', 'destroy')->name('sub-users.destroy');
        });

        // Address Book
        Route::controller(AddressBookController::class)->group(function () {
            Route::get('/address-book', 'index')->name('address-book');
            Route::get('/address-book/create', 'create')->name('address-book.create');
            Route::post('/address-book', 'store')->name('address-book.store');
            Route::get('/address-book/{id}/edit', 'edit')->name('address-book.edit');
            Route::get('/address-book/{id}/show', 'show')->name('address-book.show');
            Route::post('/address-book/{id}', 'update')->name('address-book.update');
            Route::delete('/address-book/{id}', 'destroy')->name('address-book.destroy');
        });
    });

    // ---------------------------
    // 🚚 Carrier Routes
    // ---------------------------
    Route::prefix('carrier')->name('carrier.')->middleware(['role:' . RoleEnum::CARRIER->value])->group(function () {

        // Carrier Sub Users
        Route::controller(CarrierSubUserController::class)->group(function () {
            Route::get('/carrier-users', 'index')->name('carrier-users');
            Route::post('/carrier-users', 'store')->name('carrier-users.store');
            Route::get('/carrier-users/{id}/edit', 'edit')->name('carrier-users.edit');
            Route::get('/carrier-users/{id}/show', 'show')->name('carrier-users.show');
            Route::post('/carrier-users/{id}', 'update')->name('carrier-users.update');
            Route::delete('/carrier-users/{id}', 'destroy')->name('carrier-users.destroy');
        });

        // Carrier Documents
        Route::controller(CarrierDocumentController::class)->group(function () {
            Route::get('/documents', 'index')->name('documents');
            Route::get('/documents/create', 'create')->name('documents.create');
            Route::post('/documents', 'store')->name('documents.store');
            Route::get('/documents/{id}/edit', 'edit')->name('documents.edit');
            Route::post('/documents/{id}', 'update')->name('documents.update');
            Route::get('/documents/{id}/show', 'show')->name('documents.show');
            Route::get('/documents/{id}/download', 'download')->name('documents.download');
            Route::delete('/documents/{id}', 'destroy')->name('documents.destroy');
        });

        Route::controller(TruckController::class)->group(function () {
            Route::get('/trucks', 'index')->name('trucks.index');
            Route::get('/trucks/create', 'create')->name('trucks.create');
            Route::post('/trucks', 'store')->name('trucks.store');
            Route::get('/trucks/{id}/edit', 'edit')->name('trucks.edit');
            Route::post('/trucks/{id}', 'update')->name('trucks.update');
            Route::get('/trucks/{id}/show', 'show')->name('trucks.show');
            Route::delete('/trucks/{id}', 'destroy')->name('trucks.destroy');
        });

        Route::controller(DriverController::class)->group(function () {
            Route::get('/drivers', 'index')->name('drivers');
            Route::get('/drivers/create', 'create')->name('drivers.create');
            Route::post('/drivers', 'store')->name('drivers.store');
            Route::get('/drivers/{id}/edit', 'edit')->name('drivers.edit');
            Route::post('/drivers/{id}', 'update')->name('drivers.update');
            Route::get('/drivers/{id}/show', 'show')->name('drivers.show');
            Route::delete('/drivers/{id}', 'destroy')->name('drivers.destroy');
        });

    });
});

// Auth routes (login, register, etc. from Laravel Breeze/Fortify/etc.)
require __DIR__.'/auth.php';
