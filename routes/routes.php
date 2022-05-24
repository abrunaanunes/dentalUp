<?php

use Pecee\SimpleRouter\SimpleRouter;

SimpleRouter::group([
],function () {
    SimpleRouter::get('/', 'FrontController@index');
    SimpleRouter::post('/login', 'FrontController@login');
    SimpleRouter::get('/logout', 'FrontController@logout');
    SimpleRouter::get('/register', 'FrontController@register');
    SimpleRouter::get('/dashboard', 'DashboardController@index');
});

SimpleRouter::group([
        'prefix' => 'user'
    ],function () {
        SimpleRouter::get('/create', 'UserController@create');
        SimpleRouter::post('/store', 'UserController@store');
        SimpleRouter::get('/edit', 'UserController@edit');
        SimpleRouter::get('/update', 'UserController@update');
        SimpleRouter::get('/destroy', 'UserController@destroy');
});

SimpleRouter::group([
    'prefix' => 'appointment'
],function () {
    SimpleRouter::get('/', 'AppointmentController@index');
    SimpleRouter::get('/create', 'AppointmentController@create');
    SimpleRouter::post('/store', 'AppointmentController@store');
    SimpleRouter::get('/edit/{id}', 'AppointmentController@edit');
    SimpleRouter::post('/update/{id}', 'AppointmentController@update');
    SimpleRouter::get('/destroy/{id}', 'AppointmentController@destroy');
});

SimpleRouter::group([
    'prefix' => 'client'
],function () {
    SimpleRouter::get('/', 'ClientController@index');
    SimpleRouter::get('/create', 'ClientController@create');
    SimpleRouter::post('/store', 'ClientController@store');
    SimpleRouter::get('/edit/{id}', 'ClientController@edit');
    SimpleRouter::post('/update/{id}', 'ClientController@update');
    SimpleRouter::get('/destroy/{id}', 'ClientController@destroy');
});

SimpleRouter::group([
    'prefix' => 'dentist'
],function () {
    SimpleRouter::get('/', 'DentistController@index');
    SimpleRouter::get('/create', 'DentistController@create');
    SimpleRouter::post('/store', 'DentistController@store');
    SimpleRouter::get('/edit/{id}', 'DentistController@edit');
    SimpleRouter::post('/update/{id}', 'DentistController@update');
    SimpleRouter::get('/destroy/{id}',  'DentistController@destroy');
});

// SimpleRouter::error(function(Request $request, \Exception $exception) {

//     switch($exception->getCode()) {
//         // Page not found
//         case 404:
//             response()->redirect('/not-found');
//         // Forbidden
//         case 403:
//             response()->redirect('/forbidden');
//     }
    
// });

