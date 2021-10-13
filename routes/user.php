<?php
Route::middleware('auth')
    ->group(function () {
        Route::resource('enroll', 'user\EnrollmentController');
        Route::get('dashboard', 'user\StudentController@dashBoard')->name('student.dashboard');
        Route::get('township/search', 'user\TownshipController@search')->name('township.search');
        Route::get('course/search', 'user\CourseController@search')->name('course.search');
        Route::post('pay', 'user\PaymentController@pay')->name('payment.make');
    });

Route::any('/logout', function () {
    auth()->logout();;
    return redirect()->route('home');
})->name('logout')->middleware('auth');
