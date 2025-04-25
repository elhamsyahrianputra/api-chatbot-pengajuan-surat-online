<?php

namespace App\Http\Controllers\API\Letter;

use App\Http\Controllers\Controller;
use App\Http\Requests\Letter\StoreLetterTypeRequest;
use App\Http\Requests\Letter\UpdateLetterTypeRequest;
use App\Http\Resources\Letter\LetterTypeResource;
use App\Models\LetterSubmission;
use App\Models\LetterType;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class LetterTypeController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $validIncludes = $this->getValidIncludes(['requirements']);
        $letterTypes = LetterType::with($validIncludes)->get();

        return response()->json([
            'code' => 200,
            'status' => 'OK',
            'message' => 'All letter types retrieved successfully.',
            'data' => LetterTypeResource::collection($letterTypes),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLetterTypeRequest $request): JsonResponse
    {
        $validateData = $request->validated();

        if (isset($validateData['name'])) {
            $validateData['slug'] = Str::slug($validateData['name']);
        }

        $letterType = LetterType::create($validateData);

        return response()->json([
            'code' => 201,
            'status' => 'CREATED',
            'message' => 'Letter type created successfully.',
            'data' => new LetterTypeResource($letterType)
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(LetterType $letterType): JsonResponse
    {
        $validIncludes = $this->getValidIncludes(['requirements']);
        $letterType->load($validIncludes);

        return response()->json([
            'code' => 200,
            'status' => 'OK',
            'message' => 'Letter type retrieved successfully.',
            'data' => new LetterTypeResource($letterType)
        ]);
    }

    /**
     * Display the specified resource by slug.
     */
    public function showBySlug(LetterType $letterType): JsonResponse
    {
        $validIncludes = $this->getValidIncludes(['requirements']);
        $letterType->load($validIncludes);

        return response()->json([
            'code' => 200,
            'status' => 'OK',
            'message' => 'Letter type retrieved successfully.',
            'data' => new LetterTypeResource($letterType)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLetterTypeRequest $request, LetterType $letterType): JsonResponse
    {
        $validateData = $request->validated();

        if (isset($validateData['name'])) {
            $validateData['slug'] = Str::slug($validateData['name']);
        }

        $letterType->update($validateData);

        return response()->json([
            'code' => 200,
            'status' => 'OK',
            'message' => 'Letter type updated successfully.',
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
            'message' => 'Letter type deleted successfully',
        ]);
    }
}
