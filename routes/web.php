<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SurveyController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [WelcomeController::class, 'index'])->name('welcome.index');
Route::post('/', [WelcomeController::class, 'save'])->name('welcome.save');

Route::get('/login', [AuthController::class, 'index'])->name('auth.index');
Route::post('/login', [AuthController::class, 'login'])->name('auth.login');
Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dasboard.index');

Route::get('/survey', [SurveyController::class, 'indexSurvey'])->name('survey.index');
Route::get('/survey/analisis', [SurveyController::class, 'indexAnalysisSurvey'])->name('survey.analysis');
Route::get('/survey/analisis/umur', [SurveyController::class, 'indexUmur'])->name('survey.umur');
Route::get('/survey/analisis/jenis-kelamin', [SurveyController::class, 'indexJenisKelamin'])->name('survey.jk');
Route::get('/survey/analisis/pekerjaan', [SurveyController::class, 'indexPekerjaan'])->name('survey.pekerjaan');
Route::get('/survey/analisis/alamat', [SurveyController::class, 'indexAlamat'])->name('survey.alamat');
Route::get('/survey/analisis/lama-pengunaan', [SurveyController::class, 'indexLamaPenggunaan'])->name('survey.lama-pengunaan');