<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\ChildCategoryController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\SettingController;

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
          Route::get('/delete/{id}','ChildCategoryController@delete')->name('childCategory.delete');
          Route::get('/edit/{id}','ChildCategoryController@edit')->name('childCategory.edit');
          Route::post('/update','ChildCategoryController@update')->name('childCategory.update');
     });

     Route::group(['prefix'=>'brand'],function (){
         Route::get('/','brandController@index')->name('brand.index');
         Route::post('/store','brandController@store')->name('brand.store');
         Route::get('/delete/{id}','brandController@delete')->name('brand.delete');
         Route::get('/edit/{id}','brandController@edit');
         Route::post('/update','brandController@update')->name('brand.update');
     });

     Route::group(['prefix'=>'setting'],function(){
          Route::group(['prefix'=>'seo'],function(){
          
          Route::get('/','SettingController@seo')->name('setting.seo');
          Route::post('/update/{id}','SettingController@update')->name('setting.seo.update');
          });
     });
});



//admin login route
Route::get('/admin-login', [App\Http\Controllers\Auth\LoginController::class, 'admin_login'])->name('admin.login');
// Route::get('/cat', [App\Http\Controllers\Admin\SubCategoryController::class, 'index'])->name('subcategory.index');
