<?php

use App\Http\Controllers\AirController;
use App\Http\Controllers\AirportController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\FlightController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\TiketController;
use App\Http\Controllers\UserController;
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

Route::get('/', [PageController::class, 'HomePage'])->name('HomePage');
Route::get('/flights', [PageController::class, 'FlightsPage'])->name('FlightsPage');
Route::post('/flights/search', [FlightController::class, 'index'])->name('SearchFlights');
Route::get('/contacts', [PageController::class, 'ContactsPage'])->name('ContactsPage');

Route::get('/user', [PageController::class, 'UserPage'])->name('UserPage');
Route::put('/user/edit/save/{user}', [UserController::class, 'UserEditSave'])->name('UserEditSave');

Route::get('/user/tickets', [PageController::class, 'UserTicketsPage'])->name('UserTicketsPage');
Route::delete('/user/ticket/delete/{tiket}', [TiketController::class, 'destroy'])->name('RefuseTicket');
Route::get('/user/tickets/sort', [TiketController::class, 'SortTicket'])->name('SortTicket');

Route::get('/auth', [PageController::class, 'AuthPage'])->name('AuthPage');
Route::post('/login', [UserController::class, 'LoginUser'])->name('LoginUser');

Route::get('/registration', [PageController::class, 'RegistrationPage'])->name('RegistrationPage');
Route::post('/registration/save', [UserController::class, 'NewUserSave'])->name('NewUserSave');
Route::get('/exit', [UserController::class, 'ExitUser'])->name('ExitUser');

Route::get('/buy/{flight?}', [PageController::class, 'BuyPage'])->name('BuyPage');
Route::post('/buy/save', [TiketController::class, 'store'])->name('SaveTicket');



Route::group(['middleware'=>['admin','auth'], 'prefix'=>'admin'], function () {
    Route::get('/cities', [PageController::class, 'CitiesPage'])->name('CitiesPage');
    Route::get('/cities/add', [PageController::class, 'AddCityPage'])->name('AddCityPage');
    Route::post('/cities/add/save', [CityController::class, 'store'])->name('AddCitySave');

    Route::get('/city/edit/{city}', [PageController::class, 'EditCityPage'])->name('EditCityPage');
    Route::put('/city/edit/save/{city}', [CityController::class, 'update'])->name('EditCitySave');
    Route::delete('/city/delete/{city}', [CityController::class, 'destroy'])->name('DeleteCity');



    Route::get('/airs', [PageController::class, 'AirsPage'])->name('AirsPage');
    Route::get('/air/add', [PageController::class, 'AddAirPage'])->name('AddAirPage');
    Route::post('/air/add/save', [AirController::class, 'store'])->name('AddAirSave');

    Route::get('/air/edit/{air}', [PageController::class, 'EditAirPage'])->name('EditAirPage');
    Route::put('/air/edit/save/{air}', [AirController::class, 'update'])->name('EditAirSave');
    Route::delete('/air/delete/{air}', [AirController::class, 'destroy'])->name('DeleteAir');



    Route::get('/airports', [PageController::class, 'AirportsPage'])->name('AirportsPage');
    Route::get('/airport/add', [PageController::class, 'AddAirportPage'])->name('AddAirportPage');
    Route::post('/airport/add/save', [AirportController::class, 'store'])->name('AddAirportSave');

    Route::get('/airport/edit/{airport}', [PageController::class, 'EditAirportPage'])->name('EditAirportPage');
    Route::put('/airport/edit/save/{airport}', [AirportController::class, 'update'])->name('EditAirportSave');
    Route::delete('/airport/delete/{airport}', [AirportController::class, 'destroy'])->name('DeleteAirport');



    Route::get('/flights', [PageController::class, 'AdminFlightsPage'])->name('AdminFlightsPage');
    Route::get('/flight/add', [PageController::class, 'AddFlightPage'])->name('AddFlightPage');
    Route::post('/flight/add/save', [FlightController::class, 'store'])->name('AddFlightSave');

    Route::get('/flight/edit/{flight?}', [PageController::class, 'EditFlightPage'])->name('EditFlightPage');
    Route::put('/flight/edit/save/{flight}', [FlightController::class, 'update'])->name('EditFlightSave');
    Route::delete('/flight/delete/{flight?}', [FlightController::class, 'destroy'])->name('DeleteFlight');
    Route::put('/flights/edit/status/{flight?}', [FlightController::class, 'EditStatus'])->name('EditStatus');



    Route::get('/tickets', [PageController::class, 'TicketsPage'])->name('TicketsPage');
    Route::get('/tickets/sort', [TiketController::class, 'SortTicketAdmin'])->name('SortTicketAdmin');



    Route::get('/users', [PageController::class, 'UsersPage'])->name('UsersPage');
    Route::get('/users/edit/{user}', [PageController::class, 'EditUserPage'])->name('EditUserPage');
    Route::delete('/users/delete/{user}', [UserController::class, 'DeleteUser'])->name('DeleteUser');
});
