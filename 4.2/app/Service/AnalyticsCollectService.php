<?php

namespace App\Service;

use App\Models\Nft;
use App\Models\NftHistory;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

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

    //	nft_id price duration
    public function upForRent(array $data)
    {
        $data['user_id'] = Auth::user()->getAuthIdentifier();
        $data['created_at'] = time();
        $data['type'] = NftHistory::TYPE_UP_FOR_RENT;
        $nfthistory = NftHistory::create($data);

        $nft = Nft::where('id', $data['nft_id'])->first();
        $nft->updated_at = time();
        $nft->status = Nft::STATUS_PUBLIC;
        $nft->save();

        return $nfthistory;
    }

    // nft_id
    public function removeFromRent(array $data)
    {
        $data['user_id'] = Auth::user()->getAuthIdentifier();
        $data['created_at'] = time();
        $data['type'] = NftHistory::TYPE_FREE;
        $nfthistory = NftHistory::create($data);

        $nft = Nft::where('id', $data['nft_id'])->first();
        $nft->updated_at = time();
        $nft->status = Nft::STATUS_CREATE;
        $nft->save();

        return $nfthistory;
    }

    /**
    - public_key
    - nft_key
    - new_owner_public_key
    - price
    - duration
     */
    public function rented(array $data)
    {
        $nft = Nft::where('id', $data['nft_id'])->first();
        $newOwner = User::where('public_key', $data['new_owner_public_key'])->first();
        $nft->updated_at = time();
        $nft->status = Nft::STATUS_RENT;
        $nft->save();

        // type	nft_id	user_id	owner_user_id	price	duration	created_at
        $historyData = [
            'type' => NftHistory::TYPE_RENTED,
            'nft_id' => $data['nft_id'],
            'user_id' => $nft->user_id,
            'owner_user_id' => $newOwner->id,
            'price' => $data['price'],
            'duration' => $data['duration'],
            'created_at' => time(),
        ];
        $nfthistory = NftHistory::create($historyData);

        return $nfthistory;
    }

    /**
    - public_key
    - nft_key
    - owner_public_key
    */
    public function rentEnd(array $data)
    {
        $nft = Nft::where('id', $data['nft_id'])->first();
        $nft->status = Nft::STATUS_CREATE;
        $nft->save();

        // type	nft_id	user_id	owner_user_id	price	duration	created_at
        $historyData = [
            'type' => NftHistory::TYPE_RETURN_FROM_RENT,
            'nft_id' => $data['nft_id'],
            'user_id' => Auth::user()->getAuthIdentifier(),
            'created_at' => time()
        ];

        $nfthistory = NftHistory::create($historyData);

        return $nfthistory;
    }

    public function getAnalytics($publicKey)
    {
        $result = [];

        return $publicKey;
    }
}
