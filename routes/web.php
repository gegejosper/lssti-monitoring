<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});
Route::get('/unknown_user', 'FrontController@unknown_user');
Route::namespace('Panel')->prefix('panel')->name('panel.')->group(function() {
    Route::middleware('can:manage-admin')->prefix('admin')->name('admin.')->group(function() {
        Route::get('/', 'AdminController@dashboard')->name('dashboard');

        Route::get('/settings', 'AdminController@settings')->name('settings');     
        Route::get('/reports', 'AdminController@reports')->name('reports');     
        Route::get('/settings/roles', 'AdminController@roles')->name('roles');  
        Route::get('/settings/backup', 'AdminController@backup')->name('backup');        
        Route::get('/settings/backup/users', 'BackupController@backup_users')->name('backup_users');        
        Route::get('/settings/users', 'AdminController@users')->name('subscribers');
        Route::get('/settings/users/{user_id}', 'UserController@edit_user')->name('edit_user');  
        Route::post('/settings/users/update', 'UserController@update_user')->name('update_user');  
        Route::post('/settings/users/modify', 'UserController@modify_user')->name('modify_user');  
        Route::post('/settings/users/add', 'UserController@add_user')->name('add_user');  
        
        Route::get('/settings/logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
    });
});


require __DIR__.'/auth.php';
