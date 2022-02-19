<?php

namespace App\Http\Controllers;

use App\Service\Web3Service;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function get(Web3Service $web3Service)
    {
        return response()->json($web3Service->getEvt());
    }
}
