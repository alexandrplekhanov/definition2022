<?php

namespace App\Http\Controllers;

use App\Service\AnalyticsCollectService;
use App\Service\AnalyticsGetService;
use Illuminate\Http\Request;

class AnalyticsController extends Controller
{
    private AnalyticsCollectService $analyticsCollectService;
    private AnalyticsGetService $analyticsGetService;

    public function __constructor(
        AnalyticsCollectService $analyticsCollectService,
        AnalyticsGetService $analyticsGetService
    )
    {
        $this->analyticsCollectService = $analyticsCollectService;
        $this->analyticsGetService = $analyticsGetService;
    }

    public function login()
    {
        try {
            $inputData = [
                'public_key' => request()->get('public_key'),
            ];

            return $this->analyticsCollectService->login($inputData);
        } catch (\Throwable $e) {

        }
    }

    public function createNft()
    {
        try {
            return $this->analyticsCollectService->createNft();
        } catch (\Throwable $e) {

        }
    }

    // [nft_id price duration]
    public function upForRent(Request $request)
    {
        try {
            $result = $this->analyticsCollectService->upForRent($request->post());
            return response()->json($result);
        } catch (\Throwable $e) {
            return response()->json([
                'error' => $e->getMessage(),
            ]);
        }
    }

    // [nft_id]
    public function removeFromRent(Request $request)
    {
        try {
            $result = $this->analyticsCollectService->removeFromRent($request->post());
            return response()->json($result);
        } catch (\Throwable $e) {
            return response()->json([
                'error' => $e->getMessage(),
            ]);
        }
    }

    // [nft_id. ]
    public function rented(Request $request)
    {
        try {
            $result = $this->analyticsCollectService->rented($request->post());
            return response()->json($result);
        } catch (\Throwable $e) {
            return response()->json([
                'error' => $e->getMessage(),
            ]);
        }
    }

    public function rentEnd(Request $request)
    {
        try {
            $result = $this->analyticsCollectService->rentEnd($request->post());
            return $result;
        } catch (\Throwable $e) {
            return response()->json([
                'error' => $e->getMessage(),
            ]);
        }
    }

    public function getMetrics()
    {
        try {
            $publicKey = request()->get('public_key');
            return $this->analyticsGetService->getAnalytics($publicKey);
        } catch (\Throwable $e) {
            return response()->json([
                'error' => $e->getMessage(),
            ]);
        }
    }
}
