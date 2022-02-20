<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NftHistory extends Model
{
    protected $table = 'nft_history';
    protected $guarded = [];
    public $timestamps = false;

    public function create(array $inputData)
    {
        $nftHistory = new NftHistory($inputData);

        if ($nftHistory->save()) {
            return $nftHistory;
        }

        return false;
    }
}
