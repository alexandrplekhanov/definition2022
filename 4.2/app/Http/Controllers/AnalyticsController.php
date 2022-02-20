<?php

namespace App\Http\Controllers;

use App\Service\AnalyticsCollectService;
use App\Service\AnalyticsGetService;

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

    public function upForRent()
    {
        try {

        } catch (\Throwable $e) {

        }
    }

    public function removeFromRent()
    {
        try {

        } catch (\Throwable $e) {

        }
    }

    public function rented()
    {
        try {

        } catch (\Throwable $e) {

        }
    }

    public function rentEnd()
    {
        try {

        } catch (\Throwable $e) {

        }
    }

    public function getMetrics()
    {
        try {
            $publicKey = request()->get('public_key');

            return $this->analyticsGetService->getAnalytics($publicKey);
        } catch (\Throwable $e) {
            dd($e->__toString());
        }
    }
}
