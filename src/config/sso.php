<?php


return [
  
    'app_title' => "Support Performance Metric" ,
    
    'callback_url' => env("APP_URL", "http://localhost") . "/login/success",

    // redirect URL when the user is logged in
    'redirect_url' => "home",
    
    'sso_ws_url' => 'http://ds2.maxim-ic.com/singlesignon/userauth.php',
    
    'sso_users_table' => 'appusers',
    
    /*
    |--------------------------------------------------------------------------
    | Sessions attributes
    |--------------------------------------------------------------------------
    |
    | This array will list all of the attributes you want to add to your 
    | session. This attributes will put into your laravel session.
    | Please be sure that the attribute you want to add is also available 
    | from web service return from Maxim's SSO.
    |
    | Format: key => value
    | key = key to put in your session
    | value = attribute from web service return
    |
    */
    'session_attributes' => [
        'resource_id' => 'resource_id',
        'username' => 'username',
        'employeeno' => 'employeeno',
        'employeename' => 'employeename'
    ],
    
    
    /*
    |--------------------------------------------------------------------------
    | Sessions attributes to use for unauthorize access
    |--------------------------------------------------------------------------
    |
    | This array will list all of the attributes you want to add to your 
    | session if the user is not permitted to access the application. 
    | This attributes will put into your laravel session. Please be sure 
    | that the attribute you want to add is also available from web service 
    | return from Maxim's SSO. This maybe different from original session
    | attributes declared above.
    |
    | Format: key => value
    | key = key to put in your session
    | value = attribute from web service return
    |
    */
    
    'unauthorize_session_attributes' => [
        'username' => 'username',
        'employeeno' => 'employeeno',
    ],
];

