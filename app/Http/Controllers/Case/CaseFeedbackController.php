<?php

namespace App\Http\Controllers\Case;

use App\Http\Controllers\Controller;
use App\Http\Requests\Case\StoreCaseFeedbackRequest;
use App\Http\Requests\Case\UpdateCaseFeedbackRequest;
use App\Http\Resources\Case\CaseFeedbackResource;
use App\Models\CaseFeedback;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CaseFeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $validIncludes = $this->getValidIncludes(['caseRecord', 'user']);
        $caseFeedback = CaseFeedback::with($validIncludes)->get();

        return response()->json([
            'code' => 200,
            'status' => 'OK',
            'message' => 'All case feedback retrieved successfully.',
            'data' => CaseFeedbackResource::collection($caseFeedback),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCaseFeedbackRequest $request): JsonResponse
    {
        $validateData = $request->validated();
        $caseFeedback = CaseFeedback::create($validateData);

        return response()->json([
            'code' => 200,
            'status' => 'OK',
            'message' => 'Case feedback created successfully.',
            'data' => new CaseFeedbackResource($caseFeedback)
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(CaseFeedback $caseFeedback)
    {
        $validIncludes = $this->getValidIncludes(['caseRecord', 'user']);
        $caseFeedback->load($validIncludes);

        return response()->json([
            'code' => 200,
            'status' => 'OK',
            'message' => 'Ccase feedback retrieved successfully.',
            'data' => new CaseFeedbackResource($caseFeedback)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCaseFeedbackRequest $request, CaseFeedback $caseFeedback)
    {
        $validateData = $request->validated();
        $caseFeedback->update($validateData);

        return response()->json([
            'code' => 200,
            'status' => 'OK',
            'message' => 'Case feedback updated successfully.',
            'data' => new CaseFeedbackResource($caseFeedback)
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CaseFeedback $caseFeedback)
    {
        $caseFeedback->delete();

        return response()->json([
            'code' => 200,
            'status' => 'OK',
            'message' => 'Case feedback deleted successfully',
        ]);
    }
}
