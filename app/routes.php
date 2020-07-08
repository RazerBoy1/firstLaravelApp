<?php

Route::get('/', "HomeController@showWelcome");

Route::get('transaction', "TransactionController@showTransaction");
Route::post('transaction', "TransactionController@submitForm");
