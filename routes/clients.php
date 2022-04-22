<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\Client\LoginController;
use App\Http\Controllers\Client\CommentController;
//Not Logged
route::prefix('client')->name('client.')->group(function(){
    route::get('home',[HomeController::class,'index'])->name('home');
    route::get('viewNews/{id}',[HomeController::class,'getNewsById'])->name('getNewsById');
    route::get('test-mail',[HomeController::class,'testEmail'])->name('testMail');

});
//login
route::prefix('client')->name('client.')->group(function(){
    route::get('login',[LoginController::class,'index'])->name('modalLogin');
    route::post('handleLogin',[LoginController::class,'handleLogin'])->name('handleLogin');
    route::get('register',[LoginController::class,'showModalRegister'])->name('modalRegister');
    route::post('handleRegister',[LoginController::class,'handleRegister'])->name('handleRegister');
    route::get('logout',[LoginController::class,'handleLogout'])->name('handleLogout');
});
//Logged
route::prefix('client')->name('client.')->middleware('checkLoginClient')->group(function(){
    route::get('welcome',[HomeController::class,'showDashboardLogged'])->name('showDashboardLogged');
    route::get('viewNewsLogged/{id}',[HomeController::class,'getNewsByIdLogged'])->name('getNewsByIdLogged');
    route::post('comment/{id}',[CommentController::class,'handleComment'])->name('handleComment');
    route::get('client/deleteComment',[CommentController::class,'handleDelete'])->name('handleDeleteComment');
});


