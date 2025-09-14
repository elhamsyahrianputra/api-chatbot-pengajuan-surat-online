<?php

namespace App\Http\Controllers\Case;

use App\Http\Controllers\Controller;
use App\Http\Requests\Case\StoreCaseRecordRequest;
use App\Http\Requests\Case\UpdateCaseRecordRequest;
use App\Http\Resources\Case\CaseRecordResource;
use App\Models\CaseRecord;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CaseRecordController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $validIncludes = $this->getValidIncludes(['feedback']);
        $caseRecords = CaseRecord::with($validIncludes)->get();

        return response()->json([
            'code' => 200,
            'status' => 'OK',
            'message' => 'All case records retrieved successfully.',
            'data' => CaseRecordResource::collection($caseRecords)
        ]);
    }

    /**
     * Display a listing of the resource.
     */
    public function getVerified(Request $request): JsonResponse
    {
        // Memulai query builder agar bisa ditambahkan kondisi secara dinamis
        $query = CaseRecord::query();

        // Hanya mencari case record dengan status verivied
        $query->where('status', 'verified');

        // Menangani parameter 'include' untuk eager loading relasi
        $validIncludes = $this->getValidIncludes(['feedback']);
        $query->with($validIncludes);



        if ($request->has('keywords')) {
            $keywords = explode(',', $request->input('keywords'));

            $keywords = array_map('trim', $keywords);

            $query->where(function ($q) use ($keywords) {
                foreach ($keywords as $keyword) {
                    $q->orWhere('keywords', 'LIKE', '%' . $keyword . '%');
                }
            });
        }
        $caseRecords = $query->get();


        return response()->json([
            'code' => 200,
            'status' => 'OK',
            'message' => 'Case records retrieved successfully.',
            'data' => CaseRecordResource::collection($caseRecords)
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCaseRecordRequest $request)
    {
        $validateData = $request->validated();
        $caseRecord = CaseRecord::create($validateData);

        return response()->json([
            'code' => 200,
            'status' => 'OK',
            'message' => 'Case record created successfully.',
            'data' => new CaseRecordResource($caseRecord)
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(CaseRecord $caseRecord)
    {
        $validIncludes = $this->getValidIncludes(['feedback']);
        $caseRecord->load($validIncludes);

        return response()->json([
            'code' => 200,
            'status' => 'OK',
            'message' => 'Case record created successfully.',
            'data' => new CaseRecordResource($caseRecord)
        ]);
    }

    public function showByProblem(string $problem)
    {
        $problem = Str::lower($problem);
        $caseRecord = CaseRecord::where('problem', $problem)->first();

        if ($caseRecord === null) {
            return response()->json([
                'code' => 200,
                'status' => 'OK',
                'message' => 'Case record created successfully.',
                'data' => null
            ]);
        }

        return response()->json([
            'code' => 200,
            'status' => 'OK',
            'message' => 'Case record created successfully.',
            'data' => new CaseRecordResource($caseRecord)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCaseRecordRequest $request, CaseRecord $caseRecord)
    {
        $validateData = $request->validated();
        $caseRecord->update($validateData);

        return response()->json([
            'code' => 200,
            'status' => 'OK',
            'message' => 'Case record updated successfully.',
            'data' => new CaseRecordResource($caseRecord)
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CaseRecord $caseRecord)
    {
        $caseRecord->delete();

        return response()->json([
            'code' => 200,
            'status' => 'OK',
            'message' => 'Case record deleted successfully',
        ]);
    }
}
