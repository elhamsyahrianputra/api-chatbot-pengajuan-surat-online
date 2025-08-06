<?php

namespace App\Http\Controllers\API\Submission;

use App\Http\Controllers\Controller;
use App\Http\Requests\Submission\StoreLetterSubmissionRequest;
use App\Http\Requests\Submission\UpdateLetterSubmissionRequest;
use App\Http\Resources\Submission\LetterSubmissionResource;
use App\Models\LetterSubmission;
use App\Models\LetterType;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    public function store(StoreLetterSubmissionRequest $request): JsonResponse
    {
        $validateData = $request->validated();

        $letterType = LetterType::where('slug', $validateData['letter_type'])->first();
        $filePath = $request->file('file_path')->store('letter/submissions/file', 'public');

        $letterSubmission = LetterSubmission::create([
            'user_id' => Auth::guard('sanctum')->user()->id,
            'letter_type_id' => $letterType->id,
            'file_path' => $filePath
        ]);
        return response()->json([
            'code' => 201,
            'status' => 'CREATED',
            'message' => 'Letter submission created successfully.',
            'data' => new LetterSubmissionResource($letterSubmission)
        ]);
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
     * Display the latest resource by user.
     */
    public function getLatestByUser()
    {

        $user = Auth::guard('sanctum')->user();
        $validIncludes = $this->getValidIncludes(['user', 'letterType']);
        $letterSubmissions = LetterSubmission::with($validIncludes)->where('user_id', $user->id)->latest()->first();

        return response()->json([
            'code' => 200,
            'status' => 'OK',
            'message' => 'All letter submission user retrieved successfully',
            'data' => new LetterSubmissionResource($letterSubmissions),
        ]);
    }

    /**
     * Display the latest resource by user.
     */
    public function getByCode(LetterSubmission $letterSubmission): JsonResponse
    {
        $user = Auth::guard('sanctum')->user();

        // PERBAIKAN: Cek apakah user_id pada submission sama dengan user yang login
        if ($letterSubmission->user_id !== $user->id) {
            return response()->json([
                'code' => 403,
                'status' => 'FORBIDDEN',
                'message' => 'You are not authorized to access this letter submission.',
            ], 403);
        }

        // Load relationships jika user authorized
        $validIncludes = $this->getValidIncludes(['user', 'letterType']);
        $letterSubmission->load($validIncludes);

        return response()->json([
            'code' => 200,
            'status' => 'OK',
            'message' => 'Letter submission retrieved successfully.',
            'data' => new LetterSubmissionResource($letterSubmission)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLetterSubmissionRequest $request, LetterSubmission $letterSubmission)
    {
        $validateData = $request->validated();

        $letterSubmission->update($validateData);

        return response()->json([
            'code' => 200,
            'status' => 'OK',
            'message' => 'Letter type updated successfully.',
            'data' => new LetterSubmissionResource($letterSubmission)
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
