<?php

namespace App\Service;

use App\Models\Nft;
use App\Models\User;

class AnalyticsCollectService
{
    public function login()
    {
        if (User::where('public_key', request()->bearerToken())->first()) {
            return true;
        }

        $inputData = [
            'public_key' => request()->get('public_key'),
        ];

        return User::create($inputData);
    }

    //'status'
    //'nft_key'
    //'user_id'
    //'created_at'
    //'updated_at'
    public function createNft()
    {
        $time = time();

        if (!$user = User::where('public_key', request()->get('public_key'))->first()) {
            $inputData = [
                'public_key' => request()->get('public_key'),
            ];

            $user = User::create($inputData);
        }

        $nftData = [
            'status' => Nft::STATUS_CREATE,
            'nft_key' => request()->get('nft_key'),
            'user_id' => $user->id,
            'created_at' => $time,
            'updated_at' => $time,
        ];

        return Nft::create($nftData);
    }

    //'type'
    //'nft_id'
    //'user_id'
    //'owner_user_id'
    //'rice'
    //'duration'
    //'created_at'
    public function upForRent()
    {

    }

    public function removeFromRent()
    {

    }

    public function rented()
    {

    }

    public function rentEnd()
    {

    }
}
