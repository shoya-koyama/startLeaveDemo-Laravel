<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AttendanceController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/', [AttendanceController::class, 'start'])->name('attendance.start');
Route::post('/', [AttendanceController::class, 'start']); // POSTメソッドでも利用可能にする場合
// Route::middleware(['auth'])->group(function () {
//     Route::get('/arrive', [AttendanceController::class, 'arrive'])->name('arrive');
//     Route::get('/leave', [AttendanceController::class, 'leave'])->name('leave');
// });
// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
