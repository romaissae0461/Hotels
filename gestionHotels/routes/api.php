<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\factureController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ServiceReserve;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Route::view('/', 'welcome');

//Clients routes
Route::get('/index', [ClientController::class,'index'])->name('clients.index');

Route::get('/show/{id}', [ClientController::class,'show'])->name('clients.show');

Route::get('/clients/create', [ClientController::class, 'create'])->name('clients.create');
Route::post('/clients/store', [ClientController::class, 'store'])->name('clients.store');
Route::get('/clients/{client}', [ClientController::class, 'edit'])->name('clients.edit');
Route::put('/clients/{client}', [ClientController::class, 'update'])->name('clients.update');
Route::delete('/delete/{id}', [ClientController::class,'delete'])->name('clients.delete');
Route::get('clients/{id}/reservation', [ClientController::class,'reservations']);
//End clients routes



Route::get('/login', [LoginController::class, 'showForm'])->name('login');
Route::post('/log', [LoginController::class, 'login'])->name('log');


Route::get('/register', [LoginController::class, 'register'])->name('login.register');
Route::post('/register', [LoginController::class, 'create'])->name('login.create');


//Chambres routes
Route::get('/chambre/type', [RoomController::class,'roomType']);

Route::get('/chambres', [RoomController::class, 'index']);
Route::get('/chambre/create', [RoomController::class,'create']);
//Route::get('/chambre/type', [RoomController::class,'roomType']);
Route::post('/chambre/store', [RoomController::class,'store']);
Route::get('/chambre/show/{id}', [RoomController::class, 'show']);
Route::get('/chambre/{id}', [RoomController::class, 'edit']);
Route::put('/chambre/{id}', [RoomController::class,'update']);
Route::delete('/chambre/delete/{id}', [RoomController::class, 'destroy']); 

//End chambres routes


//Reservations routes

Route::get('reservation', [ReservationController::class, 'index']);
Route::post('reservation/store', [ReservationController::class,'store']);
Route::post('reservation/check', [ReservationController::class, 'checkAvailability']);
//End reservations routes

//Contacts routes

Route::get('/contacts', [ContactController::class, 'index']);
Route::get('/contacts/create', [ContactController::class,'create']);
// Route::post('/contacts/create', [ContactController::class,'create']);
// Route::get('/contacts/store', [ContactController::class,'store']);
Route::post('/contacts/store', [ContactController::class,'store']);
Route::delete('/contacts/delete/{id}', [ContactController::class,'destroy']);

//End  contacts routes


//Manager routes

Route::get('manager/dashboard', [ManagerController::class,'index']);
Route::get('/manager/clients', [ManagerController::class, 'manageClients']);
Route::get('/manager/chambres', [ManagerController::class, 'manageRooms']);
Route::get('/manager/contacts', [ManagerController::class, 'manageContacts']);
Route::get('/manager/reservations', [ManagerController::class, 'manageReservations']);
//End manager routes


//Services routes

Route::get('/service', [ServiceController::class, 'index']);
Route::get('/service/create', [ServiceController::class, 'create']);
Route::post('/service/store', [ServiceController::class, 'store']);
Route::get('/service/show/{id}', [ServiceController::class, 'show']);
Route::get('/service/{id}', [ServiceController::class, 'edit']);
Route::put('/service/{id}', [ServiceController::class, 'update']);
Route::delete('/service/delete/{id}', [ServiceController::class, 'delete']);

//End services routes

//ReservationServices Routes

Route::get('/reservice', [ServiceReserve::class, 'index']);
Route::post('/reservice/store', [ServiceReserve::class, 'store']);

//End ReservationServices Routes

//facture routes

Route::get('/factures', [FactureController::class, 'getAllFactures']);
Route::post('/facture/create', [FactureController::class, 'createFacture']);

//End facture routes

//Comment routes
Route::get('/comments', [CommentController::class, 'index']);
Route::get('/comment/create', [CommentController::class, 'create']);
Route::post('/comment/add', [CommentController::class, 'add']);
Route::delete('/comment/delete/{id}', [CommentController::class, 'delete']);
//End Comment routes