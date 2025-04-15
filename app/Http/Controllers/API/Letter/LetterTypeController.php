<?php

namespace App\Http\Controllers\API\Letter;

use App\Http\Controllers\Controller;
use App\Http\Requests\Letter\StoreLetterTypeRequest;
use App\Http\Requests\Letter\UpdateLetterTypeRequest;
use App\Http\Resources\Letter\LetterTypeResource;
use App\Models\LetterType;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class LetterTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $letterType = LetterType::all();

        return response()->json([
            'code' => 200,
            'status' => 'OK',
            'message' => 'All Letter types retrieved successfully.',
            'data' => LetterTypeResource::collection($letterType),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLetterTypeRequest $request): JsonResponse
    {
        $validateData = $request->validated();

        $letterType = LetterType::create($validateData);

        return response()->json([
            'code' => 201,
            'status' => 'CREATED',
            'message' => 'Letter types created successfully.',
            'data' => new LetterTypeResource($letterType)
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(LetterType $letterType): JsonResponse
    {
        return response()->json([
            'code' => 200,
            'status' => 'OK',
            'message' => 'Letter types retrieved successfully.',
            'data' => new LetterTypeResource($letterType)
        ]);
    }

        /**
     * Display the specified resource by slug.
     */
    public function showBySlug(LetterType $letterType): JsonResponse
    {
        return response()->json([
            'code' => 200,
            'status' => 'OK',
            'message' => 'Letter types retrieved successfully.',
            'data' => new LetterTypeResource($letterType)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLetterTypeRequest $request, LetterType $letterType): JsonResponse
    {
        $validateData = $request->validated();

        $letterType->update(['name' => $validateData['name']]);

        return response()->json([
            'code' => 200,
            'status' => 'OK',
            'message' => 'Letter types updated successfully.',
            'data' => new LetterTypeResource($letterType)
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LetterType $letterType): JsonResponse
    {
        $letterType->delete();

        return response()->json([
            'code' => 200,
            'status' => 'OK',
            'message' => 'Letter types deleted successfully',
            
        ]);
    }
}
