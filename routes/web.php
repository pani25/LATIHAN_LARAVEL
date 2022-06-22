<?php

use App\Http\Controllers\BasicController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MultipleuploadsController;
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

//cara membuat routing ke controller
//ini untuk route ver 7
//Route::get('/'), 'HomeController@index;
//route ver 8
Route::get('/', [BasicController::class, 'index'])->name('feature');
Route::get('/about', [BasicController::class, 'about'])->name('about');
Route::get('/service', [BasicController::class, 'service'])->name('service');

Auth::routes();

// Route::get('/home', [HomeController::class, 'index'])->name('home');

// route resource untuk CRUD itu diletakan setelah custom
Route::get('/restore/{id}', [CourseController::class, 'restore'])
    ->name('restore')
    ->middleware('auth');
Route::resource('/courses', CourseController::class)->middleware('auth');

Route::get('/multipleuploads', [MultipleuploadsController::class])->name(
    'uploads'
);
Route::post('/save', [MultipleuploadsController::class])->name('uploads.store');
// Route::get('/', function () {
//     return view('welcome');
// });

//dasar dari routing

// Route::get('/salam', function () {
//     return 'Hai Nama Saya Pani';
// });

// Route::get('/salam/{nama}', function ($nama) {
//     return 'Hai Nama Saya ' . $nama;
// });

//regular expression
// Route::get('/number/{id}', function ($id) {
//     return 'number is ' . $id;
// })->where('id', '[0-9]+');

// Route::get('/nama/{nama}', function ($nama) {
//     return 'my name is ' . $nama;
// })->where('nama', '[A-Za-z]+');

// Route::get('/barang/{elektronik}', function ($elektronik) {
//     return 'Ini adalah ' . $elektronik;
// })->whereIn('elektronik', ['Hp', 'Komputer', 'Printer']);
