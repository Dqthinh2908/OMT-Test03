<?php

use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\NewsController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\PermissionController;
//Login
route::prefix('admin')->name('admin.')->group(function(){
    route::get('login',[LoginController::class,'showLoginAdmin'])->name('login');
    route::post('handle',[LoginController::class,'handleLogin'])->name('handle.login');
    route::get('logout',[LoginController::class,'handleLogout'])->name('logout');
});
//Dashboard
route::prefix('admin')->name('admin.')->middleware('checkLoginAdmin')->group(function(){
    route::get('dashboard',[DashboardController::class,'showDashboard'])->name('dashboard')->middleware('can:post_list');
    route::get('addNews',[NewsController::class,'showAddNews'])->name('showAddNews')->middleware('can:post_add');
    route::post('addNews',[NewsController::class,'handleAddNews'])->name('handleAddNews');
    route::get('editNews/{id}',[NewsController::class,'showUpdateNews'])->name('showUpdateNews')->middleware('can:post_edit,id');
    route::post('update',[NewsController::class,'handleUpdateNews'])->name('handleUpdateNews');
    route::get('delete/{id}',[NewsController::class,'handleDeleteNews'])->name('handleDeleteNews')->middleware('can:post_delete');
    route::get('postsShowTrashDelete',[NewsController::class,'showTrash'])->name('showTrash')->middleware('post_trash');
    route::get('postsRestoreDelete/{id}',[NewsController::class,'newsRestore'])->name('handleRestore');
    route::get('postsForceDelete/{id}',[NewsController::class,'handleNewsForce'])->name('handleForceNews');
});
//User
route::prefix('admin')->name('admin.')->middleware('checkLoginAdmin')->group(function(){
    route::get('showUsers',[UserController::class,'index'])->name('showUser')->middleware('can:user_list');
    route::get('showAddUser',[UserController::class,'showAddUser'])->name('showAddUser')->middleware('can:user_add');
    route::post('handleAddUser',[UserController::class,'handleAddUser'])->name('handleAddUser');
    route::get('showEditUser/{id}',[UserController::class,'showEditUser'])->name('showEditUser')->middleware('can:user_edit');
    route::post('handleUpdateUser/{id}',[UserController::class,'handleUpdateUser'])->name('handleUpdateUser');
    route::get('handleDeleteUser/{id}',[UserController::class,'handleDeleteUser'])->name('handleDeleteUser')->middleware('can:user_delete');
});
//Customer
route::prefix('admin')->name('admin.')->middleware('checkLoginAdmin')->group(function(){
    route::get('showCustomer',[CustomerController::class,'index'])->name('showCustomer');
});
//Categories
route::prefix('admin')->name('admin.')->middleware('checkLoginAdmin')->group(function(){
    route::get('showCategories',[CategoryController::class,'index'])->name('showCategories')->middleware('can:category_list');
    route::get('showAddCategories',[CategoryController::class,'showAddCategory'])->name('showAddCategory')->middleware('can:category_add');
});
//Comment
route::prefix('admin')->name('admin.')->middleware('checkLoginAdmin')->group(function(){
    route::get('showComment',[CommentController::class,'index'])->name('showComment');
    route::get('showTrashComment',[CommentController::class,'showCommentTrash'])->name('showCommentTrash');
    route::get('commentRestoreDelete/{id}',[CommentController::class,'handleRestoreComment'])->name('handleRestoreComment');
    route::get('commentForceDelete/{id}',[CommentController::class,'handleForceComment'])->name('handleForceComment');
});
//Roles
route::prefix('admin')->name('admin.')->middleware('checkLoginAdmin')->group(function(){
    route::get('showRoles',[RoleController::class,'index'])->name('showRoles');
    route::get('showAddRoles',[RoleController::class,'showAddRoles'])->name('showAddRoles');
    route::post('handleAddRoles',[RoleController::class,'handleAddRoles'])->name('handleAddRoles');
    route::get('showEditRoles/{id}',[RoleController::class,'showEditRoles'])->name('showEditRoles');
    route::post('handleEditRoles/{id}',[RoleController::class,'handleEditRoles'])->name('handleEditRoles');
    route::get('handleDeleteRoles/{id}',[RoleController::class,'handleDeleteRoles'])->name('handleDeleteRoles');
    
});
//Permisson
route::prefix('admin')->name('admin.')->middleware('checkLoginAdmin')->group(function(){
    route::get('showPermissionRole',[PermissionController::class,'showPermissionRole'])->name('showPermissionRole');
    route::post('handleAddPermission',[PermissionController::class,'handleAddPermission'])->name('handleAddPermission');
});