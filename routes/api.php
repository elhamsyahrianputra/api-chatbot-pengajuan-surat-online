<?php

use App\Http\Controllers\API\Letter\LetterRequirementController;
use App\Http\Controllers\API\Letter\LetterTypeController;
use App\Http\Controllers\API\Submission\LetterSubmissionController;
use App\Http\Controllers\API\Thread\ThreadController;
use App\Http\Controllers\API\User\UserController;
use App\Http\Controllers\Case\CaseFeedbackController;
use App\Http\Controllers\Case\CaseRecordController;
use App\Http\Resources\User\UserResource;
use App\Models\LetterSubmission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum',])->get('/user', function () {
    $user = Auth::guard('sanctum')->user();
    $user->load('profile');
    $response = new UserResource($user);
    return response()->json([
        'code' => 200,
        'status' => 'OK',
        'message' => 'User Authenticated data retrieved successfully',
        'data' => $response
    ]);
});

Route::middleware('api')->group(function () {
    // Letter Types
    Route::apiResource('letter-types', LetterTypeController::class)
        ->only(['index']);
    Route::get('letter-types/slug/{letterType:slug}', [LetterTypeController::class, 'showBySlug']);

    // Letter Submissions
    Route::apiResource('letter-submissions', LetterSubmissionController::class)
        ->only('store');
    Route::get('letter-submissions/get-latest-by-user', [LetterSubmissionController::class, 'getLatestByUser']);
    Route::get('letter-submissions/code/{letterSubmission:code}', [LetterSubmissionController::class, 'getByCode']);

    // Case Record
    Route::get('case-records/verified', [CaseRecordController::class, 'getVerified']);
});


Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('letter-types', LetterTypeController::class)
        ->except(['index']);

    Route::apiResource('letter-requirements', LetterRequirementController::class);

    Route::apiResource('letter-submissions', LetterSubmissionController::class)
        ->except('store');

    Route::apiResource('users', UserController::class);
    Route::apiResource('threads', ThreadController::class)->only('index', 'store');
    Route::delete('threads', [ThreadController::class, 'destoryAllByUser']);

    // Case Records
    Route::apiResource('case-records', CaseRecordController::class);
    Route::apiResource('case-feedback', CaseFeedbackController::class);
});


require __DIR__ . '/auth.php';
