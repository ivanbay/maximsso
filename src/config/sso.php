<?php


return [
  
    /*
    |--------------------------------------------------------------------------
    | Application Title
    |--------------------------------------------------------------------------
    |
    | Application title to be use on login page.
    |
    */
    
    'app_title' => "Support Performance Metric" ,
    
    
    
    /*
    |--------------------------------------------------------------------------
    | URL/Callback Function for login validation
    |--------------------------------------------------------------------------
    |
    | Method to be called or redirect link for login validation.
    | APP_URL from .env file should be updated with application's base url 
    | and it will be suffixes by /login/success - this is by default and
    | do not replace.
    |
    */    
    
    'callback_url' => env("APP_URL", "http://localhost") . "/login/success",

    
    
    /*
    |--------------------------------------------------------------------------
    | Redirect URL after successful login
    |--------------------------------------------------------------------------
    |
    | Link to go to after logging in successfully.
    |
    */     
    
    'redirect_url' => "home",
    
    
    
    /*
    |--------------------------------------------------------------------------
    | Maxim's SSO web service link
    |--------------------------------------------------------------------------
    |
    | SSO web service server URL to use for logging in. 
    | Update this section if WS URL is replaced.
    |
    */ 
    
    'sso_ws_url' => 'http://ds2.maxim-ic.com/singlesignon/userauth.php',
    
    
    
    /*
    |--------------------------------------------------------------------------
    | Database table for users
    |--------------------------------------------------------------------------
    |
    | Table that will keep users information. You can rename the table and 
    | add fields but do not replace or remove the existing fields.
    |
    */  
    
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

