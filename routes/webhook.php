<?php
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    require '../app/Telegram/Bot/Handler.php';
});
