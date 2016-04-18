<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

// ---------------------- AcountController ----------------------

Route::controller('acount', 'AcountController');

Route::get('/login', 'AcountController@showLogin');

Route::get('/change-password', 'AcountController@showChangePassword');

Route::get('/logout', 'AcountController@actionLogout');

Route::get('/profile', 'AcountController@showProfile');

Route::post('/login', 'AcountController@actionLogin');

Route::post('/change-password', 'AcountController@actionChangePassword');

Route::post('/update-profile', 'AcountController@actionUpdateProfile');

// --------------------- EmployeeController ------------------

Route::controller('manager/user', 'EmployeeController');

Route::get('/user/add', 'EmployeeController@showAddEmployee');

Route::get('/user/search', 'EmployeeController@showSearchEmployee');

Route::get('/user/rate', 'EmployeeController@showUpdateEmployee');

Route::get('/user/list/{type}', 'EmployeeController@showListEmployee');

Route::get('/user/delete/{id}', 'EmployeeController@actionDeleteEmployee');

Route::get('/user/block/{id}', 'EmployeeController@actionBlockEmployee');

Route::get('/user/unblock/{id}', 'EmployeeController@actionUnlockEmployee');

Route::get('/user/check', 'EmployeeController@showCheckEmployee');

Route::get('/user/check/go', 'EmployeeController@showCheckGoEmployee');

Route::get('/user/check/back', 'EmployeeController@showCheckBackEmployee');

Route::post('/user/search', 'EmployeeController@actionSearchEmployee');

Route::post('/user/add', 'EmployeeController@actionAddEmployee');

Route::post('/user/check/go', 'EmployeeController@actionCheckGo');

Route::post('/user/check/back', 'EmployeeController@actionCheckBack');

Route::post('/user/get-user-rate', 'EmployeeController@actionGetEmployeeByUsername');

// --------------------- WorkController ------------------

Route::controller('manager/work', 'WorkController');

Route::get('/work/add', 'WorkController@showAddWork');

Route::get('/work/search', 'WorkController@showSearchWork');

Route::get('/work/give', 'WorkController@showGiveWork');

Route::get('/work/list/{type}', 'WorkController@showListWork');

Route::get('/work/delete/{id}', 'WorkController@actionDeleteWork');

Route::get('/work/update', 'WorkController@showUpdateWork');

Route::get('/work/rate', 'WorkController@showRateWork');

Route::get('/work/detail/{id}', 'WorkController@showDetailWork');

Route::get('/work/rate/{id}', 'WorkController@showRateWorkDetail');

Route::post('/work/add', 'WorkController@actionAddWork');

Route::post('/work/search', 'WorkController@actionSearchWork');

Route::post('/work/give', 'WorkController@actionGiveWork');

Route::post('/work/get-work', 'WorkController@actionGetWorkByName');

Route::post('/work/update', 'WorkController@actionUpdateWork');

Route::post('/work/rate', 'WorkController@actionRateWork');