<?php
use Illuminate\Support\Facades\Route;

Route::post('/', function () {
    require '../app/Telegram/Bot/Handler.php';
});
