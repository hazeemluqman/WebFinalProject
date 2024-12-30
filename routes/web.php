<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AcademicianController;
use App\Http\Controllers\GrantController;
use App\Http\Controllers\GrantMemberController;
use App\Http\Controllers\MilestoneController;

Route::get('/', function () {
    return view('layouts.app');
});

Route::resource('/academicians', AcademicianController::class);
Route::resource('/grants', GrantController::class);
Route::resource('/grant-members', GrantMemberController::class);
Route::resource('/milestones', MilestoneController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');