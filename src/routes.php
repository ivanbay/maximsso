<?php

Route::group(['middleware' => ['web']], function () {
    Route::controller("login", "mxm\sso\controllers\SSOController");
});
