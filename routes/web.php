<?php

use App\Http\Controllers\HotelController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\ReservationController;

Route::get('/hotels', [HotelController::class, 'index']);
Route::get('/rooms', [RoomController::class, 'index']);
Route::get('/reservations', [ReservationController::class, 'index']);