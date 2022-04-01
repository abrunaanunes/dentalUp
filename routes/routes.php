<?php

use Pecee\SimpleRouter\SimpleRouter;

SimpleRouter::get('/', 'HomeController@index');

SimpleRouter::get('/user', 'UserController@index');
SimpleRouter::get('/user/store', 'UserController@store');

SimpleRouter::error(function(Request $request, \Exception $exception) {

    switch($exception->getCode()) {
        // Page not found
        case 404:
            response()->redirect('/not-found');
        // Forbidden
        case 403:
            response()->redirect('/forbidden');
    }
    
});

