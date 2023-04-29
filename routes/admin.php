<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use Illuminate\Support\Facades\Route;

// Route::get('check',function(){

//     echo "admin here";
// });

// Route::get('admin/home', [App\Http\Controllers\HomeController::class, 'admin'])->name('admin.home')->middleware('isAdmin');


Route::group(['namespace'=>'App\Http\Controllers\Admin','middleware'=>'isAdmin'],function(){
    
     Route::get('/admin/home','AdminController@admin')->name('admin.home');
     Route::get('/admin/logout','AdminController@logout')->name('admin.logout');

     
     Route::group(['prefix'=>'category'],function(){

          Route::get('/','CategoryController@index')->name('category.index');
          Route::get('/store','CategoryController@store')->name('category.store');

     });
});



//admin login route
Route::get('/admin-login', [App\Http\Controllers\Auth\LoginController::class, 'admin_login'])->name('admin.login');