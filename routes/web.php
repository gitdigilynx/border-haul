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
use App\Http\Controllers\Backend\Admin\SubAdminController;
use App\Http\Controllers\Backend\Admin\PermissionController;
use App\Http\Controllers\Backend\Admin\SubCarrierUserController;
use App\Http\Controllers\Backend\Admin\AdminCarrierUserController;
use App\Http\Controllers\Backend\Admin\SubShippperUserController;
use App\Http\Controllers\Backend\Admin\ShippperUserController;

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



Route::middleware(['auth'])->group(function () {

    // Redirect / to /home
    Route::get('/', fn () => to_route('home'));

    // Common Roles
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
    // 🚢 Admin Routes
    // ---------------------------
 Route::prefix('admin')
    ->name('admin.')
    ->middleware(['role:' . RoleEnum::ADMIN->value . '|' . RoleEnum::subAdmin->value])
    ->group(function () {
        // Sub Admin
        Route::controller(SubAdminController::class)->group(function () {
            Route::get('/sub-admin', 'index')->name('sub-admin');
            Route::post('/sub-admin', 'store')->name('sub-admin.store');
            Route::get('/sub-admin/{id}/edit', 'edit')->name('sub-admin.edit');
            Route::get('/sub-admin/{id}', 'show')->name('sub-admin.show');
            Route::post('/sub-admin/{id}', 'update')->name('sub-admin.update');
            Route::delete('/sub-admin/{id}', 'destroy')->name('sub-admin.destroy');

            //Assign Permissions
            Route::get('/sub-admin/{id}/assign-permissions', 'editPermission')->name('sub-admin.permissions.edit');
            Route::post('/sub-admin/{id}/assign-permissions', 'updatePermission')->name('sub-admin.permissions.update');
            Route::patch('/sub-users/{id}/toggle-admin',  'toggleAdmin')->name('sub-users.toggleAdmin');
        });

        // Permissions
        Route::controller(PermissionController::class)->group(function () {
            Route::get('/permissions', 'index')->name('permissions.index');
            Route::get('/permissions/create', 'create')->name('permissions.create');
            Route::post('/permissions', 'store')->name('permissions.store');
            Route::get('/permissions/{id}/edit', 'edit')->name('permissions.edit');
            Route::get('/permissions/{id}', 'show')->name('permissions.show');
            Route::post('/permissions/{id}', 'update')->name('permissions.update');
            Route::delete('/permissions/{id}', 'destroy')->name('permissions.destroy');
            Route::patch('/sub-users/{id}/toggle-permission',  'togglePermission')->name('sub-users.togglePermission');

        });

        // Carriers
        Route::controller(SubCarrierUserController::class)->group(function () {
            Route::get('/sub-carriers', 'index')->name('sub-carriers');
            Route::post('/sub-carriers', 'store')->name('sub-carriers.store');
            Route::get('/sub-carriers/{id}/edit', 'edit')->name('sub-carriers.edit');
            Route::get('/sub-carriers/{id}', 'show')->name('sub-carriers.show');
            Route::post('/sub-carriers/{id}', 'update')->name('sub-carriers.update');
            Route::delete('/sub-carriers/{id}', 'destroy')->name('sub-carriers.destroy');
            Route::patch('/sub-carriers/{id}/toggle-user', 'toggleSubCarrier')->name('sub-carriers.toggleSubCarrier');

        });

          Route::controller(AdminCarrierUserController::class)->group(function () {
            Route::get('/carriers', 'index')->name('carriers');
            Route::post('/carriers', 'store')->name('carriers.store');
            Route::get('/carriers/{id}/edit', 'edit')->name('carriers.edit');
            Route::get('/carriers/{id}', 'show')->name('carriers.show');
            Route::post('/carriers/{id}', 'update')->name('carriers.update');
            Route::delete('/carriers/{id}', 'destroy')->name('carriers.destroy');
            Route::patch('/carriers/{id}/toggle-user', 'toggleCarrier')->name('carriers.toggleCarrier');
        });

          Route::controller(SubShippperUserController::class)->group(function () {
            Route::get('/sub-shippers', 'index')->name('sub-shippers');
            Route::get('/sub-shippers/create', 'create')->name('sub-shippers.create');
            Route::post('/sub-shippers', 'store')->name('sub-shippers.store');
            Route::get('/sub-shippers/{id}/edit', 'edit')->name('sub-shippers.edit');
            Route::get('/sub-shippers/{id}', 'show')->name('sub-shippers.show');
            Route::post('/sub-shippers/{id}', 'update')->name('sub-shippers.update');
            Route::delete('/sub-shippers/{id}', 'destroy')->name(name: 'sub-shippers.destroy');
            Route::patch('/sub-shippers/{id}/toggle-user', 'toggleSubShipper')->name('sub-shippers.toggleSubUser');
        });

          Route::controller(ShippperUserController::class)->group(function () {
            Route::get('/shippers', 'index')->name('shippers');
            Route::get('/shippers/create', 'create')->name('shippers.create');
            Route::post('/shippers', 'store')->name('shippers.store');
            Route::get('/shippers/{id}/edit', 'edit')->name('shippers.edit');
            Route::get('/shippers/{id}', 'show')->name('shippers.show');
            Route::post('/shippers/{id}', 'update')->name('shippers.update');
            Route::delete('/shippers/{id}', 'destroy')->name(name: 'shippers.destroy');
            Route::patch('/shippers/{id}/toggle-user', 'toggleShipper')->name('shippers.toggleSubUser');
        });

    });

    // ---------------------------
    // 🏢 Shipper Routes
    // ---------------------------
    Route::prefix('shipper')->name('shipper.')->middleware(['role:' . RoleEnum::SHIPPER->value])->group(function () {

        // Sub Users
        Route::controller(SubUserController::class)->group(function () {
            Route::get('/sub-users', 'index')->name('sub-users');
            Route::get('/sub-users/create', 'create')->name('sub-users.create');
            Route::post('/sub-users', 'store')->name('sub-users.store');
            Route::get('/sub-users/{id}/edit', 'edit')->name('sub-users.edit');
            Route::get('/sub-users/{id}', 'show')->name('sub-users.show');
            Route::post('/sub-users/{id}', 'update')->name('sub-users.update');
            Route::delete('/sub-users/{id}', 'destroy')->name(name: 'sub-users.destroy');
            Route::patch('/sub-users/{id}/toggle-user', 'toggleSubUser')->name('sub-users.toggleSubUser');

        });

        // Address Book
        Route::controller(AddressBookController::class)->group(function () {
            Route::get('/address-book', 'index')->name('address-book');
            Route::get('/address-book/create', 'create')->name('address-book.create');
            Route::post('/address-book', 'store')->name('address-book.store');
            Route::get('/address-book/{id}/edit', 'edit')->name('address-book.edit');
            Route::get('/address-book/{id}', 'show')->name('address-book.show');
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
            Route::get('/carrier-users/{id}', 'show')->name('carrier-users.show');
            Route::post('/carrier-users/{id}', 'update')->name('carrier-users.update');
            Route::delete('/carrier-users/{id}', 'destroy')->name('carrier-users.destroy');
            Route::patch('/carrier-users/{id}/toggle-user', 'toggleCarrierUser')->name('sub-users.toggleCarrierUser');

        });

        // Carrier Documents
        Route::controller(CarrierDocumentController::class)->group(function () {
            Route::get('/documents', 'index')->name('documents');
            Route::get('/documents/create', 'create')->name('documents.create');
            Route::post('/documents', 'store')->name('documents.store');
            Route::get('/documents/{id}/edit', 'edit')->name('documents.edit');
            Route::post('/documents/{id}', 'update')->name('documents.update');
            Route::get('/documents/{id}', 'show')->name('documents.show');
            Route::get('/documents/{id}/download', 'download')->name('documents.download');
            Route::delete('/documents/{id}', 'destroy')->name('documents.destroy');
        });

        // Trucks
        Route::controller(TruckController::class)->group(function () {
            Route::get('/trucks', 'index')->name('trucks');
            Route::get('/trucks/create', 'create')->name('trucks.create');
            Route::post('/trucks', 'store')->name('trucks.store');
            Route::get('/trucks/{id}/edit', 'edit')->name('trucks.edit');
            Route::post('/trucks/{id}', 'update')->name('trucks.update');
            Route::get('/trucks/{id}', 'show')->name('trucks.show');
            Route::delete('/trucks/{id}', 'destroy')->name('trucks.destroy');
            Route::patch('/trucks/{truck}/toggle-truck', 'toggleTruck')->name('trucks.toggleTruck');
        });

        // Drivers
        Route::controller(DriverController::class)->group(function () {
            Route::get('/drivers', 'index')->name('drivers');
            Route::get('/drivers/create', 'create')->name('drivers.create');
            Route::post('/drivers', 'store')->name('drivers.store');
            Route::get('/drivers/{id}/edit', 'edit')->name('drivers.edit');
            Route::post('/drivers/{id}', 'update')->name('drivers.update');
            Route::get('/drivers/{id}', 'show')->name('drivers.show');
            Route::delete('/drivers/{id}', 'destroy')->name('drivers.destroy');
        });
    });
});


// Auth routes (login, register, etc. from Laravel Breeze/Fortify/etc.)
require __DIR__.'/auth.php';
