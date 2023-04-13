<?php
use Illuminate\Support\Facades\Route;

// Route::get('check',function(){

//     echo "admin here";
// });

Route::get('admin/home', [App\Http\Controllers\HomeController::class, 'admin'])->name('admin.home')->middleware('isAdmin');