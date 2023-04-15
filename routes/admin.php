<?php
use Illuminate\Support\Facades\Route;

// Route::get('check',function(){

//     echo "admin here";
// });

Route::get('admin/home', [App\Http\Controllers\HomeController::class, 'admin'])->name('admin.home')->middleware('isAdmin');


//admin login route
Route::get('/admin-login', [App\Http\Controllers\Auth\LoginController::class, 'admin_login'])->name('admin.login');