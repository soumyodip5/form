<?php

use App\Http\Controllers\FormController;
use App\Http\Controllers\Name_SubjectController;
use App\Http\Controllers\OptionController;
use App\Http\Controllers\Form_SubmitController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/form', [FormController::class, 'index']);
Route::post('/form', [FormController::class, 'store']);
Route::put('/form/{id}', [FormController::class, 'edit']);
Route::post('/form/{id}', [FormController::class, 'update']);
Route::delete('/form/{id}', [FormController::class, 'delete']);

Route::get('/formname', [Name_SubjectController::class, 'index']);
Route::post('/formname', [Name_SubjectController::class, 'store']);

Route::get('/optionstore', [OptionController::class, 'index']);
Route::post('/optionstore', [OptionController::class, 'optionstore']);

Route::get('/formsubmit', [Form_SubmitController::class, 'index']);
Route::post('/fromcreate', [Form_SubmitController::class, 'create']);
