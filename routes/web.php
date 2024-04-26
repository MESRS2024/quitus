<?php

use App\Http\Controllers\CirculationController;
use App\Http\Controllers\searchableMailController;
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
    return redirect(route('login'));
});

Route::get('lang/{lang}', ['as' => 'lang.switch', 'uses' => 'App\Http\Controllers\LanguageController@switchLang']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Auth::routes();

Route::resource('administration/users', App\Http\Controllers\UserController::class);

Route::get('students/exonerated', [App\Http\Controllers\StudentController::class, 'Exonerated'])
        ->name('students.exonerated');

Route::get('students/not_exonerated', [App\Http\Controllers\StudentController::class, 'not_exonerated'])
        ->name('students.not_exonerated');

Route::resource('students', App\Http\Controllers\StudentController::class);
