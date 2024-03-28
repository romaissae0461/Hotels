<?php

use App\Http\Controllers\Admin;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ReservationController;
use App\Models\TypeHotel;
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

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/admin', function () {
//     return view('Admins/admin');
// });

// Route::get('/register', function () {
//     return view('register');
// });


// Route::get('/password', function () {
//     return view('password');
// });


// Route::get('/hotel1', function () {
//     return view('hotels.hotel1');
// });


// Route::get('/rooms', function () {
//     return view('hotels/rooms');
// });


// Route::get('/index', [ClientController::class, 'index'])->name('clients/index');
// Route::post('/index', [ClientController::class, 'index'])->name('clients/index');

// Route::get('/index', [ClientController::class, 'index'])->name('clients/index');
// Route::post('/index', [ClientController::class, 'index'])->name('clients/index');


// Route::get('/reservations', [ReservationController::class,'index'])->name('reservations.index');
// Route::post('/reservations', [ReservationController::class,'store'])->name('reservations.book');



//Contacts routes
// Route::get('/index', [ContactController::class, 'index'])->name('contacts.index');
// Route::get('/contacts/create', [ContactController::class,'create'])->name('contacts.create');
// Route::post('/contacts/create', [ContactController::class,'create'])->name('contacts.create');
// Route::get('/contacts/store', [ContactController::class,'store'])->name('contacts.store');
// Route::post('/contacts/store', [ContactController::class,'store'])->name('contacts.store');
//end contacts routes

//Client routes
// Route::get('/index', [ClientController::class,'index'])->name('clients.index');
// Route::get('/clients/create', [ClientController::class, 'create'])->name('clients.create');
// Route::post('/clients/store', [ClientController::class, 'store'])->name('clients.store');
// Route::get('/clients/{client}', [ClientController::class, 'edit'])->name('clients.edit');
// Route::put('/clients/{client}', [ClientController::class, 'update'])->name('clients.update');
// Route::get('/show/{id}', [ClientController::class,'show'])->name('clients.show');
// Route::delete('/delete/{id}', [ClientController::class,'delete'])->name('clients.delete');
//End Client routes

//Route::get('/index', [ClientController::class, 'index']);

// Route::get('/register', [LoginController::class, 'register'])->name('login.register');
// Route::post('/register', [LoginController::class, 'create'])->name('login.create');


// Route::get('/login', [LoginController::class, 'showForm'])->name('login');
// Route::post('/log', [LoginController::class, 'login'])->name('log');


// Route::post('/admin/addHotel', [Admin::class, 'storeHotel'])->name('admin.storeHotel');
// Route::get('/admin/addHotel', [Admin::class, 'addHotel'])->name('admin.addHotel');


// Route::get('/admin/manageHotels', [Admin::class, 'manageHotels'])->name('admin.manageHotels');

// Route::get('/admin/offre', [Admin::class, 'offre'])->name('admin.offre');

// Route::get('/', [Admin::class, 'offres'])->name('admin.offres');


//Route::resource('/clients','ClientController');
//Route::resource('/reservations','ReservationController');
//Route::resource('/rooms','RoomController');
//Route::resource('/contacts','ContactController');
//Route::resource('/managers','ManagerController');
// Route::group(['middleware'=>'auth'],function(){
//     Route::get('/logout',[
//         'uses'=>'ClientController@logout',
//         'as'=>'clients.logout'
//     ]);
// });

// Route::get('/delete/{id}/client',[
//     'uses'=>'ClientController@destroy',
//     'as'=>'client.delete'
// ]);
// Route::get('/delete/{id}/contactMessage',[
//     'uses'=>'ContactsController@destroy',
//     'as'=>'contacts.delete'
// ]);
// Route::get('/delete/{id}/admin',[
//     'uses'=>'ManagerController@destroy',
//     'as'=>'managers.delete'
// ]);
// Route::get('/contacts',[
//     'uses'=>'ContactsController@index',
//     'as'=>'contacts.index'
// ]);


