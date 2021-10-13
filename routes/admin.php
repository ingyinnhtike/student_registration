<?php
//======== admin start ===========
use Illuminate\Support\Facades\Route;

Route::get('/token/login/{token}', 'ResponseTokenController@login');  
Route::namespace('admin')
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::middleware('guest')
            ->group(function () {
                Auth::routes();
            });

        Route::get('password-reset', 'Auth\ResetPasswordController@showResetForm')->name('password-reset-form');
        Route::post('password-update', 'Auth\ResetPasswordController@reset')->name('password-update');
        Route::get('/', 'DashboardController@index')->name('dashboard');
        Route::post('/', 'DashboardController@getSummary')->name('dashboard.summary');
        Route::resource('enrollment', 'EnrollmentController', [
            'names' => 'enrollment'
        ]);

        Route::resource('course', 'CourseController');
        Route::resource('major', 'MajorController');
        Route::resource('year', 'YearController');
        Route::resource('fee', 'FeeController');
        Route::resource('permission', 'PermissionController');

        Route::apiResource('course_fee', 'CourseFeeController');
        Route::delete('course/fee', 'CourseController@deleteFee')->name('course.delete-fee');
        Route::put('course/fee', 'CourseController@updateFee')->name('course.update-fee');
        Route::post('course/fee', 'CourseController@addFee')->name('course.add-fee');


        Route::get('approval', 'AcceptanceController@index')->name('acceptance.index');
        Route::post('approval/enrollment', 'AcceptanceController@approve')->name('acceptance.approve');

        Route::get('payment_receive', 'AcceptanceController@indexPayment')->name('payment_receive.index');
        Route::post('payment_receive/receive', 'AcceptanceController@approvePayment')->name('payment_receive.approve');

        Route::get('roles/change', 'AdminController@showRoles')->name('role.change.show');
        Route::post('roles/change', 'AdminController@updateRoles')->name('role.change.update');

        Route::get('permissions/change', 'AdminController@showPermissions')->name('permission.change.show');
        Route::post('permissions/change', 'AdminController@updatePermissions')->name('permission.change.update');

        Route::get('report', 'ReportController@index')->name('report.index');
        Route::post('report/excel', 'ReportController@excel')->name('report.excel');

        Route::get('invoices', 'InvoiceController@index')->name('invoices.index');
        Route::get('invoices/summary', 'InvoiceController@summary')->name('invoices.summary');

        Route::get('chart', 'ChartController@getChart')->name('chart');

    });
//======== admin end ===========
