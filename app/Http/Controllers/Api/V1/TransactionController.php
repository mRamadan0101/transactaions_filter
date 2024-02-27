<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Services\DataProviderService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TransactionController extends Controller
{
    private $dataProviderService;

    public function __construct(DataProviderService $dataProviderService)
    {
        $this->dataProviderService = $dataProviderService;
    }

    public function filter(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'provider' => 'nullable',
            'statusCode' => 'nullable|in:paid,pending,reject',
            'amounteMin' => 'nullable|integer',
            'amounteMax' => 'nullable|integer|gt:amounteMin',
            'currency' => 'nullable|alpha',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors(),
            ], 400);
        }

        try {
            $transactions = $this->dataProviderService->getAllTransactions();
            $data = [
                'success' => true,
                'status_code' => 200,
                'message' => 'Successfully',
                'data' => $transactions,

            ];

            return response()->json($data, 200);

            
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
