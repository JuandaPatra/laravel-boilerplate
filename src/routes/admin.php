<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register admin routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes();

Route::group(['middleware' => 'auth'], function () {
     Route::group(['middleware' => ['role:super-admin|admin']], function () {
        Route::get('/admin-dashboard', function(){
            return view('admin.dashboard.index');
        })->name('admin.dashboard');
     });
});