<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AttendanceController;

Route::get('/', function () {
    return view('home');
});
Route::get('/attendance', [AttendanceController::class, 'start'])->name('attendance.start');
Route::post('/attendance', [AttendanceController::class, 'start'])->name('attendance.start');
Route::post('/attendance/leave', [AttendanceController::class, 'leave'])->name('attendance.leave');
// Route::middleware(['auth'])->group(function () {
//     Route::get('/arrive', [AttendanceController::class, 'arrive'])->name('arrive');
//     Route::get('/leave', [AttendanceController::class, 'leave'])->name('leave');
// });
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
