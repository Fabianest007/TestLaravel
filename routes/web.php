<?php

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

Route::get('/', 'Auth\LoginController@showLoginForm');
//Auth::routes();
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::get('login_auth', 'Auth\LoginController@showLoginForm_2')->name('login2');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');
Route::get('home', 'HomeController@index');
// Route::get('/', function () {
//     return view('welcome');
// });

Route::resource('documento','DocumentoController');
Route::resource('tipoDocumento','TipoDocumentoController');
Route::resource('estado','EstadoController');

// Route::get('ticket','Admin\TawkTicketController@pendientes')->name('ticket.pendientes');
// Route::get('ticket','Admin\TawkTicketController@index')->name('ticket.index');
// Route::get('ticket','Admin\TawkTicketController@edit')->name('ticket.edit');
// Route::post('ticket','Admin\TawkTicketController@update')->name('ticket.update');
Route::resource('ticket','Admin\TawkTicketController');
Route::get('ticket-asignados','Admin\TawkTicketController@asignados')->name('ticket.asignados');
// Route::get('ticket-pendientes','Admin\TawkTicketController@pendientes')->name('ticket.pendientes');



Route::get('webpay','WebpayController@getTransaccion')->name('webpay.getTransaccion');
Route::post('webpay','WebpayController@inicioTransaccion')->name('webpay.inicioTransaccion');


// Auth::routes();
// Route::get('/home', 'HomeController@index')->name('home');
