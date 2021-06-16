<?php


use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::get('/event/{slug}', 'DetailEventController@index')->name('detail-event');

Route::group(['middleware' => ['auth']], function () {

    Route::group(['middleware' => ['seller']] ,function () {

        Route::get('/dashboard/event', 'DashboardEventController@index')->name('dashboard-event');
        Route::get('/dashboard/event/create', 'DashboardEventController@create')->name('dashboard-event-create');
        Route::post('/dashboard/event/store', 'DashboardEventController@store')->name('dashboard-event-store');
        Route::get('/dashboard/event/{id}/edit', 'DashboardEventController@edit')->name('dashboard-event-edit');
        Route::post('/dashboard/event/{id}/update', 'DashboardEventController@update')->name('dashboard-event-update');
        Route::get('/dashboard/event/{id}', 'DashboardEventController@detail')->name('dashboard-event-detail');

        Route::get('/dashboard/ticket', 'DashboardTicketController@index')->name('dashboard-ticket');
        Route::get('/dashboard/ticket/add/{id}', 'DashboardTicketController@add')->name('dashboard-ticket-add');
        Route::post('/dashboard/ticket/store', 'DashboardTicketController@store')->name('dashboard-ticket-store');
        Route::post('/dashboard/ticket/edit/{id}', 'DashboardTicketController@edit')->name('dashboard-ticket-edit');
        Route::post('/dashboard/ticket/delete', 'DashboardTicketController@destroy')->name('dashboard-ticket-delete');

        Route::get('/dashboard/transaction', 'DashboardTransactionController@index')->name('dashboard-transaction');
    });

    Route::delete('/event/ticket/all/', 'CartController@deleteall')->name('transaction-delete');
    Route::delete('/event/ticket/{id}', 'CartController@delete')->name('transaction-detail-delete');
    Route::post('/event/ticket', 'CartController@store')->name('cart');
    Route::get('/event/ticket/checkout', 'CartController@checkout')->name('checkout');
    Route::post('/event/ticket/process', 'CartController@process')->name('process');

    Route::get('/dashboard', 'DashboardController@index')
        ->name('user-dashboard');

    Route::get('/dashboard/myticket', 'DashboardTicketController@myticket')->name('dashboard-myticket');
    Route::get('/dashboard/mytransaction', 'DashboardTransactionController@mytransaction')->name('dashboard-mytransaction');

    Route::get('/dashboard/proofpayment/{id}', 'DashboardTransactionController@proofpayment')->name('dashboard-proofpayment');
    Route::post('/dashboard/proofpayment/process/{id}', 'DashboardTransactionController@processpayment')->name('dashboard-processpayment');

    Route::get('/dashboard/myprofile', 'DashboardProfileController@myprofile')->name('dashboard-profile');
    Route::post('/dashboard/myprofile/{redirect}', 'DashboardProfileController@update')->name('dashboard-profile-update');

    Route::get('/dashboard/accounts', 'DashboardAccountController@index')->name('dashboard-account');
    Route::post('/dashboard/accounts/store', 'DashboardAccountController@store')->name('dashboard-account-post');
    Route::post('/dashboard/accounts/update', 'DashboardAccountController@update')->name('dashboard-account-update');

    Route::get('/dashboard/myprofile/verification', 'DashboardProfileController@verification')->name('dashboard-verification');
    Route::post('/dashboard/myprofile/verification/store', 'DashboardProfileController@store')->name('dashboard-verification-process');
});

Route::prefix('admin')
    ->namespace('Admin')
    ->middleware(['auth', 'admin'])
    ->group(function () {
        Route::get('/', 'DashboardController@index')->name('dashboard');

        Route::resource('event', 'EventController');
        Route::get('/event/{id}/ticket', 'TicketController@addticket')->name('add-ticket');
        Route::resource('user', 'UserController');
        Route::resource('banner', 'BannerController');
        Route::resource('ticket', 'TicketController');
        Route::resource('transaction', 'TransactionController');
        Route::resource('blog', 'BlogController');
    });
