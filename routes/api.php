<?php

use App\Http\Controllers\Api\ChecklistController;
use App\Http\Controllers\Api\ItemController;
use App\Http\Controllers\Api\UserController;
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


Route::group(["midleware" => ["auth:api"]], function () {

    Route::post('checklists/{checklist}/items', [ItemController::class, 'store']);
    Route::get('checklists/{checklist}/items/{item}', [ItemController::class, 'show']);
    Route::put('checklists/{checklist}/items/{item}', [ItemController::class, 'update']);
    Route::put('checklists/{checklist}/items/{item}/toggle', [ItemController::class, 'toggleCompletion']);
    Route::delete('checklists/{checklist}/items/{item}', [ItemController::class, 'delete']);

    Route::get('checklists', [ChecklistController::class, 'index']);
    Route::post('checklists/store', [ChecklistController::class, 'store']);
    Route::delete('checklists/{id}', [ChecklistController::class, 'delete']);
    Route::get('checklists/{id}', [ChecklistController::class, 'show']);
    Route::put('checklists/{id}', [ChecklistController::class, 'update']);
});
Route::post('login', [UserController::class, 'login']);
Route::post('register', [UserController::class, 'register']);
