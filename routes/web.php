<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
*/

// AUTHENTICATION $ AUTHORIZATION
$router->group(['prefix' => 'api'], function () use ($router) {
    
    // Matches /api/*
    $router->get('/', function () use ($router) {
        return "Welcome to Nubeero APIs";
        // return $router->app->version();
    });
    
    $router->post('/register', 'AuthController@register');
    $router->post('login', 'AuthController@login');
    $router->get('profile', 'UserController@profile');

    $router->get('users', 'UserController@allUsers');
    // Matches "/api/users/* 
    $router->get('users/{id}', 'UserController@singleUser');

    // INSURANCE
    $router->post('/healthinsurance', 'HealthinsuranceController@post');
    $router->post('/MotorInsurance', 'AutobaseMotorInsuranceController@post');
    $router->post('/GetQuotation', 'GetQuotationController@post');
    $router->post('/CreatePolicyfromQuotation', 'CreatePolicy4mQuotationController@post');
    $router->post('/PayforQuotation', 'Pay4QuotationController@post');

 });

