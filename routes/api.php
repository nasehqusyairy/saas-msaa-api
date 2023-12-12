<?php

// use Illuminate\Http\Request;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\PresenceController;
use App\Http\Controllers\StudentController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::apiResource('/students', StudentController::class);
Route::apiResource('/activities', ActivityController::class);
// Route::apiResource('/presences', PresenceController::class);
// Route::get('/presences/activity/{activity_id}', [PresenceController::class, 'indexByActivity']);
