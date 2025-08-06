<?php

namespace App\Http\Controllers\API\Thread;

use App\Http\Controllers\Controller;
use App\Http\Requests\Thread\StoreThreadRequest;
use App\Http\Resources\Thread\ThreadResource;
use App\Models\Thread;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ThreadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $user = Auth::guard('sanctum')->user();
        $threads = Thread::where('user_id', $user->id)->get();

        return response()->json([
            'code' => 200,
            'status' => "OK",
            'message' => 'All thread retrieved successfully ',
            'data' => ThreadResource::collection($threads)
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreThreadRequest $request): JsonResponse
    {
        $user = Auth::guard('sanctum')->user();

        $validateData = $request->validated();

        $thread = Thread::create([
            'user_id' => $user->id,
            'role' => $validateData['role'],
            'message' => $validateData['message'],
        ]);

        return response()->json([
            'code' => 201,
            'status' => 'CREATED',
            'message' => 'Thread created successfully',
            'data' => new ThreadResource($thread)
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
    public function destroy()
    {
        //
    }

    /**
     * Remove resources by auth user.
     */
    public function destoryAllByUser(): JsonResponse
    {
        $user = Auth::guard('sanctum')->user();
        Thread::where('user_id', $user->id)->delete();

        return response()->json([
            'code' => 200,
            'status' => 'OK',
            'message' => 'All threads deleted successfully'
        ]);
    }
}
