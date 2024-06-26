<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;

use App\Http\Controllers\AdminController;

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

Route::get('/', [HomeController::class, 'index']);

Route::get('/home', [HomeController::class, 'redirect'])->middleware('auth', 'verified');

Route::post('/appointment', [HomeController::class, 'appointment']);

Route::get('/myappointment', [HomeController::class, 'myappointment']);

Route::get('/cancle_appointment/{id}', [HomeController::class, 'cancle_appointment']);




Route::get('/add_doctor_view', [AdminController::class, 'addview']);

Route::post('/doctor_info', [AdminController::class, 'Doctor_Info']);

Route::get('/showappointment', [AdminController::class, 'showappointment']);

Route::get('/approve_appointment/{id}', [AdminController::class, 'approve_appointment']);

Route::get('/cancle_appointment/{id}', [AdminController::class, 'cancle_appointment']);

Route::get('/showdoctor', [AdminController::class, 'showdoctor']);

Route::get('/delete_doctor/{id}', [AdminController::class, 'delete_doctor']);

Route::get('/update_doctor/{id}', [AdminController::class, 'update_doctor']);

Route::post('/edit_doctor/{id}', [AdminController::class, 'edit_doctor']);


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
