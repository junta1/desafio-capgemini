<?php
declare(strict_types=1);

namespace Bank\Services;

use Bank\Repositories\AccountRepository;

class BalanceService
{
    protected $account;

    public function __construct(AccountRepository $accountRepository)
    {
        $this->account = $accountRepository;
    }

    public function balance($id):array
    {
        $output = $this->account->find($id);

        $outputCustom = $this->outputCustom($output);

        return $outputCustom;
    }

    public function outputCustom($output):array
    {
        return [
            'idAccount'=> $output['acco_id'],
            'agency'=> $output['acco_agency'],
            'account'=> $output['acco_account'],
            'balance'=> $output['acco_balance'],
            'client'=> $output['cod_client'],
            'bank'=> $output['cod_bank'],
        ];
    }
}
