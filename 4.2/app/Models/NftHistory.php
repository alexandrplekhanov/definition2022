<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NftHistory extends Model
{
    protected $table = 'nft_history';
    protected $guarded = [];
    public $timestamps = false;
}
