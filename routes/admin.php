<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\ChildCategoryController;
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
          Route::post('/store','CategoryController@store')->name('category.store');
          Route::get('/delete/{id}','CategoryController@distroy')->name('category.delete');
          Route::get('/edit/{id}','CategoryController@edit');
          Route::post('/update','CategoryController@update')->name('category.update');

     });

     Route::group(['prefix'=>'subcategory'],function(){

          Route::get('/','SubCategoryController@index')->name('subcategory.index');
          Route::post('/store','SubCategoryController@store')->name('subcategory.store');
          Route::get('/delete/{id}','SubCategoryController@destroy')->name('subcategory.delete');
          Route::get('/edit/{id}','SubCategoryController@edit');
          Route::post('/update','SubCategoryController@update')->name('subcategory.update');
     });


     Route::group(['prefix'=>'childcategory'],function(){
          
          Route::get('/','ChildCategoryController@index')->name('childcategory.index');
          Route::post('/store','ChildCategoryController@store')->name('childCategory.store');
          Route::get('/delete/{$id}','ChildCategoryController@delete')->name('childCategory.delete');
     });
});



//admin login route
Route::get('/admin-login', [App\Http\Controllers\Auth\LoginController::class, 'admin_login'])->name('admin.login');
// Route::get('/cat', [App\Http\Controllers\Admin\SubCategoryController::class, 'index'])->name('subcategory.index');