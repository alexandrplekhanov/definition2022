<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nft extends Model
{
    protected $table = 'nft';
    protected $guarded = [];
    public $timestamps = false;

    const STATUS_CREATE = 1;
    const STATUS_PUBLIC = 2;
    const STATUS_RENT = 3;

    public function create(array $inputData)
    {
        $nft = new Nft($inputData);

        if ($nft->save()) {
            return $nft;
        }

        return false;
    }
}
