<?php

use App\Http\Controllers\ContactPhonesController;
use App\Http\Controllers\ContactsController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


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
    return redirect('login');
});

Auth::routes(['register' => false]);

Route::get('/home', function () {
    return redirect('admin/contacts');
});

Route::prefix('admin')->group(function () {
    Route::get('/contacts', [ContactsController::class, 'index'])->name('contacts');
    Route::post('/contacts', [ContactsController::class, 'contactsAdd'])->name('contactsAdd');
    Route::get('/contact/to/see/{id}', [ContactsController::class, 'contactsToSee'])->name('contactsToSee');
    Route::post('/contact/edit/{id}', [ContactsController::class, 'contactsEdit'])->name('contactsEdit');
    Route::get('/contact/remove/{id}', [ContactsController::class, 'contactsRemove'])->name('contactsRemove');

    Route::prefix('contact')->group(function () {
        Route::get('/phone/remove/{contact_id}/{id}', [ContactPhonesController::class, 'contactPhoneRemove'])->name('contactPhoneRemove');
        Route::post('/phone', [ContactPhonesController::class, 'addPhoneForContact'])->name('addPhoneForContact');
    });
});
