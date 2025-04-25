<?php

namespace App\Http\Controllers\API\Submission;

use App\Http\Controllers\Controller;
use App\Http\Resources\Submission\LetterSubmissionResource;
use App\Models\LetterSubmission;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class LetterSubmissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $validIncludes = $this->getValidIncludes(['user', 'letterType']);
        $letterSubmissions = LetterSubmission::with($validIncludes)->get();

        return response()->json([
            'code' => 200,
            'status' => 'OK',
            'message' => 'All letter submission retrieved successfully',
            'data' => LetterSubmissionResource::collection($letterSubmissions)
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(LetterSubmission $letterSubmission)
    {
        $validIncludes = $this->getValidIncludes(['user', 'letterType']);
        $letterSubmission->load($validIncludes);

        return response()->json([
            'code' => 200,
            'status' => 'OK',
            'message' => 'All letter submission retrieved successfully',
            'data' => new LetterSubmissionResource($letterSubmission)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
