<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Public routes
|--------------------------------------------------------------------------
| Here is where all the public routes that does not need authentication
| goes
|
*/
 
Route::redirect('/', '/home');

Route::get('/home', 'HomeController')->name('home');

Route::resource('reports', 'ReportController')
    ->only('index', 'show');

/*
|--------------------------------------------------------------------------
| Auth routes
|--------------------------------------------------------------------------
*/
Auth::routes(['verify' => true, 'register' => false]);

/*
|--------------------------------------------------------------------------
| Admin routes
|--------------------------------------------------------------------------
| Here is where all the routes that belong to only the admin go
|
*/
Route::group(['middleware' => ['auth', 'verified'], 'namespace' => 'Admin', 'prefix' => 'admin', 'as' => 'admin.'], function(){

    Route::get('/dashboard', 'DashboardController')->name('dashboard');

    Route::resource('stations', 'StationsController');
    Route::resource('officers', 'OfficersController');
    Route::resource('roles', 'RolesController')
        ->except('show');

    Route::get('permissions', PermissionsController::class)
        ->name('permissions.index');

    Route::get('locations', LocationsController::class)
        ->name('locations.index');

    Route::resource('items', 'ItemsController')
        ->only(['index', 'store', 'destroy']);
    
    Route::resource('reports', 'ReportsController')
        ->except('create', 'store');
    
});

/*
|--------------------------------------------------------------------------
| Officer routes
|--------------------------------------------------------------------------
| Here is where all the officer routes go
|
*/
Route::group(['middleware' => ['auth'], 'namespace' => 'Officer', 'prefix' => 'officer', 'as' => 'officer.'], function(){

    Route::get('/dashboard', 'DashboardController')->name('dashboard');
    Route::resource('observers', 'ObserversController');
    
    Route::resource('reports', 'ReportsController');
});

/*
|--------------------------------------------------------------------------
| All Users Routes
|--------------------------------------------------------------------------
| Routes that all authenticated users have access to
|
*/
Route::group(['middleware' => ['auth', 'verified']], function(){

    Route::get('/user/{user}/profile', 'UsersController@showProfileInformation')
        ->name('users.profile.show');
    Route::get('/user/{user}/settings', 'UsersController@showProfileSettings')
        ->name('users.profile.settings');

    Route::delete('/user/{user}', DeleteAccountController::class)->name('users.destroy');

});

