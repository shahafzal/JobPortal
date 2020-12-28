<?php

Route::redirect('/home', '/admin');
Auth::routes(['register' => false]);

Route::get('/index', 'HomeController@index')->name('home');


Route::get('/',[
 
    'uses'=>'HomeController@login',
      
    'as'  =>'login.user'
  
  ]);
  Route::get('/signup/user',[
 
    'uses'=>'HomeController@signup',
      
    'as'  =>'signup.user'
  
  ]);
  Route::post('/client/createAccount',[
 
    'uses'=>'HomeController@createAccount',
      
    'as'  =>'client.createAccount'
    
    
  ]);

  Route::post('/client/accessAccount',[
 
    'uses'=>'HomeController@accessAccount',
      
    'as'  =>'client.accessAccount'
  
  ]);
   Route::get('/client/logout',[
 
      'uses'=>'HomeController@logout',
        
      'as'  =>'client.logout'
      ]);
Route::get('search', 'HomeController@search')->name('search');
Route::resource('jobs', 'JobController')->only(['index', 'show']);
Route::get('category/{category}', 'CategoryController@show')->name('categories.show');
Route::get('location/{location}', 'LocationController@show')->name('locations.show');

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
    Route::get('/client/index',[
 
      'uses'=>'UsersController@clientIndex',
        
      'as'  =>'client.index'
    
    ]);
    
    Route::get('/client/{id}/delete',[
 
      'uses'=>'UsersController@delete',
        
      'as'  =>'client.delete'
      ]);

    

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
