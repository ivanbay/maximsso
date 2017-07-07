<?php


return [
  
    'app_title' => "Support Performance Metric" ,
    
    'callback_url' => env("APP_URL", "http://localhost") . "/login/success",

    // redirect URL when the user is logged in
    'redirect_url' => "home",
    
    'sso_ws_url' => 'http://ds2.maxim-ic.com/singlesignon/userauth.php',
    
    'sso_users_table' => 'appusers'
    
];

