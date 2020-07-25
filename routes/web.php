<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
*/

// AUTHENTICATION $ AUTHORIZATION
$router->group(['prefix' => 'api'], function () use ($router) {
    
    $router->get('/', function () use ($router) {
        return "Welcome to Nubeero APIs";
        // return $router->app->version();
    });
    
    // Matches "/api/register
    $router->post('/register', 'AuthController@register');
    // Matches "/api/login
    $router->post('login', 'AuthController@login');

    // Matches "/api/profile
    $router->get('profile', 'UserController@profile');

    // Matches "/api/users/1 
    //get one user by id
    $router->get('users/{id}', 'UserController@singleUser');

    // Matches "/api/users
    $router->get('users', 'UserController@allUsers');


    // INSURANCE
    $router->post('/HealthInsurance', 'HealthInsuranceController@post');
    $router->post('/MotorInsurance', 'AutobaseMotorInsuranceController@post');
    $router->post('/GetQuotation', 'GetQuotationController@post');
    $router->post('/CreatePolicyfromQuotation', 'CreatePolicy4mQuotationController@post');
    $router->post('/PayforQuotation', 'Pay4QuotationController@post');

 });

