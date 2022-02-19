<?php

namespace App\Http\Controllers;

use App\Service\AnalyticsGetService;

class AnalyticsController extends Controller
{
    private AnalyticsCollectService $analyticsCollectService;
    private AnalyticsGetService $analyticsGetService;

    public function __constructor(
        AnalyticsGetService $analyticsService,
        AnalyticsGetService $analyticsGetService
    )
    {
        $this->analyticsService = $analyticsService;
        $this->analyticsGetService = $analyticsGetService;
    }

    public function login()
    {
        try {
            $publicKey = request()->get('public_key');

            return $this->analyticsService->login($publicKey);
        } catch (\Throwable $e) {

        }
    }

    public function createNft()
    {
        try {
            $publicKey = request()->get('public_key');

            return $this->analyticsService->login($publicKey);
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

    public function getMetrics(AnalyticsGetService $analyticsService)
    {
        try {
            $publicKey = request()->get('public_key');

            return $analyticsService->getAnalytics($publicKey);
        } catch (\Throwable $e) {
            dd($e->__toString());
        }
    }
}
