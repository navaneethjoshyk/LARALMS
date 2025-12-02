<?php

use App\Http\Controllers\CourseController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('courses/trash/{id}', [CourseController::class, 'trash'])
    ->name('courses.trash');

Route::get('courses/trashed', [CourseController::class, 'trashed'])
    ->name('courses.trashed');

Route::get('courses/restore/{id}', [CourseController::class, 'restore'])
    ->name('courses.restore');

Route::resource('courses', CourseController::class);
