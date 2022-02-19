<?php

namespace App\Service;

use Web3\Web3;

class Web3Service
{
    private Web3 $web3;
    private Contract $contract;

    public function __construct()
    {
        $abi = file_get_contents(__DIR__ . '/ReNft.json');
        $this->web3 = new Web3('https://ropsten.infura.io/v3/566ef03177b8440dbb622e3b63005d0e');
        $this->contract = new Contract('https://ropsten.infura.io/v3/566ef03177b8440dbb622e3b63005d0e', $abi);
    }

    public function getEvt()
    {
        return $this->contract->getEventLogs('Rent', 1, 'latest');
    }

}
