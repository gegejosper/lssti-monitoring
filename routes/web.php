<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QrCodeController;

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

// Route::get('/', function () {
//     return view('index');
// });
Route::get('/unknown_user', 'FrontController@unknown_user');
Route::get('/scan/employee/{employee_id}', 'FrontController@scan_employee');
Route::get('/', 'FrontController@index');
Route::post('/save/record', 'FrontController@save_record');
Route::post('/save/employee/log', 'FrontController@save_employee_log');
Route::post('/employee/return', 'FrontController@return_employee');
Route::get('/close_gate', 'FrontController@close_gate');
Route::get('/generate-qr-code/{text}', 'GlobalController@generateQrCode')->name('generate-qr-code');
Route::get('/qrcode_print/{id}', 'GlobalController@generateQrCode')->name('qr-code-print');
Route::namespace('Panel')->prefix('panel')->name('panel.')->group(function() {
    Route::middleware('can:manage-admin')->prefix('admin')->name('admin.')->group(function() {
        Route::get('/', 'AdminController@dashboard')->name('dashboard');

        Route::get('/settings', 'AdminController@settings')->name('settings');     
        Route::post('/settings/update', 'SettingController@update_setting')->name('update_setting');     
        Route::get('/reports/employees', 'AdminController@report_employees')->name('report_employees');    
        Route::post('/reports/employees/range', 'AdminController@report_employee_range')->name('report_employee_range');
        Route::get('/reports/visitors', 'AdminController@report_visitors')->name('report_visitors'); 
        Route::post('/reports/visitors/range', 'AdminController@report_visitors_range')->name('report_visitors_range'); 
        Route::get('/reports/penalties', 'AdminController@report_penalties')->name('report_penalties'); 
        Route::post('/reports/penalties/range', 'AdminController@report_penalties_range')->name('report_penalties_range');        
        Route::get('/settings/roles', 'AdminController@roles')->name('roles');  
        Route::get('/settings/backup', 'AdminController@backup')->name('backup');        
        Route::get('/settings/backup/users', 'BackupController@backup_users')->name('backup_users');        
        Route::get('/settings/users', 'AdminController@users')->name('subscribers');
        Route::get('/settings/users/{user_id}', 'UserController@edit_user')->name('edit_user');  
        Route::post('/settings/users/update', 'UserController@update_user')->name('update_user');  
        Route::post('/settings/users/modify', 'UserController@modify_user')->name('modify_user');  
        Route::post('/settings/users/add', 'UserController@add_user')->name('add_user');  
        Route::get('/employees', 'EmployeeController@employees')->name('employees');
        Route::post('/employees/search', 'EmployeeController@employees_search')->name('employees_search');
        Route::post('/employees/add', 'EmployeeController@employees_add')->name('employees_add');
        Route::post('/employees/update', 'EmployeeController@employees_update')->name('employees_update');
        Route::post('/employees/modify', 'EmployeeController@employees_modify')->name('employees_modify');
        Route::get('/employees/{employee_id}', 'EmployeeController@view_employee')->name('view_employee');
        Route::get('/settings/logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
        Route::get('/visitors', 'VisitorController@visitors')->name('visitors');
    });
});


require __DIR__.'/auth.php';
