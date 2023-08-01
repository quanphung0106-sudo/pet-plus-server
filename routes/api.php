<?php

use App\Http\Controllers\Api\AnswerController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ExerciseController;
use App\Http\Controllers\Api\ExerciseFormatController;
use App\Http\Controllers\Api\ExercisePartController;
use App\Http\Controllers\Api\ExerciseUnitController;
use App\Http\Controllers\Api\LevelController;
use App\Http\Controllers\Api\SourceController;
use App\Http\Controllers\Api\SubjectController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\EnterpriseController;
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

Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);

Route::middleware(['auth:api'])->group(function () {
    Route::prefix('auth')->group(function () {
        Route::get('/my-info', [AuthController::class, 'myInfo']);
        Route::post('/logout', [AuthController::class, 'logout']);
        Route::post('/refresh', [AuthController::class, 'refresh']);
    });

    Route::resources([
        'users' => UserController::class,
        'enterprises' => EnterpriseController::class,
        'levels' => LevelController::class,
        'subjects' => SubjectController::class,
        'exercise-parts' => ExercisePartController::class,
        'exercise-units' => ExerciseUnitController::class,
        'exercise-formats' => ExerciseFormatController::class,
        'sources' => SourceController::class,
        'answers' => AnswerController::class,
    ], ['except' => ['create', 'edit']]);

    Route::prefix('exercises')->group(function () {
        Route::get('/', [ExerciseController::class, 'index']);
        Route::get('/{id}', [ExerciseController::class, 'show']);
        Route::post('/', [ExerciseController::class, 'store']);
        Route::post('/{id}', [ExerciseController::class, 'update']);
        Route::delete('/{id}', [ExerciseController::class, 'destroy']);
    });
});
