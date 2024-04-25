<?php

use App\Http\Controllers\Controller_User;
use App\Http\Controllers\Controller_Car;
use App\Http\Controllers\Controller_Transaksi;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('loginpage');
});
Route::get('/registerpage', function () {
    return view('registerpage');
});

Route::get('/home', [Controller_Car::class, 'Get_All_Cars']);







Route::get('/profile', [Controller_User::class, 'User_Profile']);
Route::post('/register', [Controller_User::class, 'User_Register']);
Route::post('/login', [Controller_User::class, 'User_Login']);
Route::get('/logout', [Controller_User::class, 'User_Logout']);


Route::post('/addcar', [Controller_Car::class, 'Car_Add']);
Route::post('/search', [Controller_Car::class, 'SeachCar']);

Route::post('/newtransaksi', [Controller_Transaksi::class, 'New_Transaksi']);
Route::post('/konfirmasi', [Controller_Transaksi::class, 'konfirmasi']);

