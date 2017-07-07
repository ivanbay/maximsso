<?php

Route::get("/", function() {
    return redirect()->to("login");
});

Route::group(['middleware' => ['web']], function () {
    Route::controller("login", "Maxim\SSO\Controllers\SSOController");
});
