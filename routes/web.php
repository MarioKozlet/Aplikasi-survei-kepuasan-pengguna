<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SurveyController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SurveyDataController;

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

// Route::get('/', [WelcomeController::class, 'index'])->name('welcome.index');
// Route::post('/', [WelcomeController::class, 'save'])->name('welcome.save');

Route::get('/', [AuthController::class, 'index'])->name('auth.index');
Route::post('/', [AuthController::class, 'login'])->name('auth.login');
Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dasboard.index');

Route::get('/data', [SurveyDataController::class, 'index'])->name('data.index');
Route::post('/import', [SurveyDataController::class, 'import'])->name('data.import');

Route::get('/survey', [SurveyController::class, 'indexSurvey'])->name('survey.index');
Route::get('/survey/ci-cr', [SurveyController::class, 'indexCiCr'])->name('survey.ci-cr');
// Route::get('/survey/analisis', [SurveyController::class, 'indexAnalysisSurvey'])->name('survey.analysis');