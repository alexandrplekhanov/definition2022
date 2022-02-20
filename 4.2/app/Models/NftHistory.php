<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NftHistory extends Model
{
    protected $table = 'nft_history';
    protected $guarded = [];
    public $timestamps = false;

    const TYPE_FREE = 1;
    const TYPE_UP_FOR_RENT = 2;
    const TYPE_RENTED = 3;
    const TYPE_RETURN_FROM_RENT = 4;

    public static function create(array $inputData)
    {
        $nftHistory = new NftHistory($inputData);

        if ($nftHistory->save()) {
            return $nftHistory;
        }

        return false;
    }
}
