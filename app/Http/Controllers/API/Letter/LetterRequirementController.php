<?php

namespace App\Http\Controllers\API\Letter;

use App\Http\Controllers\Controller;
use App\Http\Requests\Letter\StoreLetterRequirementRequest;
use App\Http\Requests\Letter\UpdateLetterRequirementRequest;
use App\Http\Resources\Letter\LetterRequirementResource;
use App\Models\LetterRequirement;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class LetterRequirementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $validIncludes = $this->getValidIncludes(['letterType']);
        $letterRequirements = LetterRequirement::with($validIncludes)->get();

        return response()->json([
            'code' => 200,
            'status' => 'OK',
            'message' => 'All Letter requirements retrieved successfully.',
            'data' => LetterRequirementResource::collection($letterRequirements)
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLetterRequirementRequest $request)
    {
        $validateData = $request->validated();

        $letterRequirement = LetterRequirement::create($validateData);

        return response()->json([
            'code' => 201,
            'status' => 'CREATED',
            'message' => 'Letter requirement created successfully.',
            'data' => new LetterRequirementResource($letterRequirement)
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(LetterRequirement $letterRequirement)
    {
        $validIncludes = $this->getValidIncludes(['letterType']);
        $letterRequirement->load($validIncludes);

        return response()->json([
            'code' => 200,
            'status' => 'OK',
            'message' => 'Letter requirement retrieved successfully',
            'data' => new LetterRequirementResource($letterRequirement)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLetterRequirementRequest $request, LetterRequirement $letterRequirement)
    {
        $validateData = $request->validated();

        $letterRequirement->update($validateData);

        return response()->json([
            'code' => 200,
            'status' => 'OK',
            'message' => 'Letter requirement updated successfully',
            'data' => new LetterRequirementResource($letterRequirement)
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LetterRequirement $letterRequirement)
    {
        $letterRequirement->delete();

        return response()->json([
            'code' => 200,
            'status' => 'OK',
            'message' => 'Letter requirement deleted successfully',
        ]);
    }
}
