<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::redirect('/home', '/admin');
Auth::routes(['register' => false]);

Route::get('/', 'HomeController@index')->name('home');
Route::get('search', 'HomeController@search')->name('search');
Route::resource('jobs', 'JobController')->only(['index', 'show']);
Route::get('category/{category}', 'CategoryController@show')->name('categories.show');
Route::get('location/{location}', 'LocationController@show')->name('locations.show');

//Route::resource('/profile');

//Route::group(['prefix' => 'user', 'as' => 'user.']);

Route::get('/prof','HomePController@index')->name('prof');
Route::get('profsearch', 'HomePController@search')->name('search');
Route::resource('profiles', 'ProfileController')->only(['index', 'show']);
Route::get('category/{category}', 'CategoryController@showprof')->name('categories.showprof');
Route::get('location/{location}', 'LocationController@showprof')->name('locations.showprof');




Route::resource('/profile',Artist\ProfileController::class);
//Route::resource('/client',ClientController::class);
//Route::resource('/artist',ArtistController::class);

Route::get('/albums',          [App\Http\Controllers\AlbumsController::class,'index']);
Route::get('/albums/create',   [App\Http\Controllers\AlbumsController::class,'create']);
Route::get('/albums/{id}',     [App\Http\Controllers\AlbumsController::class,'show']);
Route::post('/albums/store',   [App\Http\Controllers\AlbumsController::class,'store']);


Route::get('/photos/create/{id}', [App\Http\Controllers\PhotosController::class,'create']);
Route::post('/photos/store',      [App\Http\Controllers\PhotosController::class,'store']);
Route::get('/photos/{id}',        [App\Http\Controllers\PhotosController::class,'show']);
Route::delete('/photos/{id}',     [App\Http\Controllers\PhotosController::class,'destroy']);

//Route::resource('/contractrequest' [App\Http\Controllers\ContractrequestController::class]); 

//Route::resource('/wishlist', 'WishlistController', ['except' => ['create', 'edit', 'show', 'update']]);

//Route::resource('/client', [App\Http\Controllers\ClientController::class]);
//Route::resource('/artist', [App\Http\Controller\ArtistController::class]);



Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Categories
    Route::delete('categories/destroy', 'CategoriesController@massDestroy')->name('categories.massDestroy');
    Route::resource('categories', 'CategoriesController');

    // Locations
    Route::delete('locations/destroy', 'LocationsController@massDestroy')->name('locations.massDestroy');
    Route::resource('locations', 'LocationsController');

    // Companies
    Route::delete('companies/destroy', 'CompaniesController@massDestroy')->name('companies.massDestroy');
    Route::post('companies/media', 'CompaniesController@storeMedia')->name('companies.storeMedia');
    Route::resource('companies', 'CompaniesController');

    // Jobs
    Route::delete('jobs/destroy', 'JobsController@massDestroy')->name('jobs.massDestroy');
    Route::resource('jobs', 'JobsController');
});


