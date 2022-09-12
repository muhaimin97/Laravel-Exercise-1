<?php

use App\Http\Controllers\PatientCOntroller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/patients', [PatientCOntroller::class, 'index']);

Route::post('/patients', [PatientCOntroller::class, 'store']);

Route::post('/patients-multiple', [PatientCOntroller::class, 'storeMultiple']);

Route::delete('/patients/{patient}', [PatientCOntroller::class, 'destroy']);
