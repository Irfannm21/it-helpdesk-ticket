<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\Organization\DeparmentController;
use App\Http\Controllers\Organization\DirectorController;
use App\Http\Controllers\Organization\DivisionController;
use App\Http\Controllers\Organization\OfficeController;
use App\Http\Controllers\Organization\PositionController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RealizationController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\WorkplanController;
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

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/profile', 'ProfileController@index')->name('profile');
Route::put('/profile', 'ProfileController@update')->name('profile.update');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/blank', function () {
    return view('blank');
})->name('blank');

Route::middleware('auth')->group(function() {
    Route::resource('basic', BasicController::class);
    Route::resource('product', ProductController::class);
    Route::resource('office', OfficeController::class);
    Route::resource('director', DirectorController::class);
    Route::resource('department', DeparmentController::class);
    Route::resource('division', DivisionController::class);
    Route::resource('position', PositionController::class);
    Route::resource('client', ClientController::class);
    Route::get('/ticket/monitor','TicketController@monitor')->name('ticket.monitor');
    Route::get('ticket/{ticket}/print', 'TicketController@print')->name('ticket.print');
    Route::resource('ticket', TicketController::class);
    Route::get('workplan/{workplan}/print', 'WorkplanController@print')->name('workplan.print');
    Route::resource('workplan', WorkplanController::class);
    Route::get('realization/{realization}/print', 'RealizationController@print')->name('realization.print');
    Route::get('realization/{realization}/show', 'RealizationController@show')->name('realization.show');
        Route::get('realization/{realization}/create', 'RealizationController@create')->name('realization.create');
    Route::get('realization', 'RealizationController@index')->name('realization.index');
    Route::post('realization/store', 'RealizationController@store')->name('realization.store');
    Route::get('realization/{realization}/edit', 'RealizationController@edit')->name('realization.edit');
    Route::put('realization/{realization}/update', 'RealizationController@update')->name('realization.update');
    Route::get('realization/{realization}/detail', 'RealizationController@detail')->name('realization.detail');
    Route::post('realization/{realization}/submit', 'RealizationController@submit')->name('realization.submit');
    Route::get('realization/{realizationDetail}/detailEdit', 'RealizationController@detailEdit')->name('realization.detailEdit');
    Route::put('realization/{realizationDetail}/detailUpdate', 'RealizationController@detailUpdate')->name('realization.detailUpdate');
    Route::delete('realization/{realizationDetail}/detailDelete', 'RealizationController@detailDelete')->name('realization.detailDelete');
    Route::resource('review', ReviewController::class);
});
