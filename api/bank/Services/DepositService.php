<?php
declare(strict_types=1);

namespace Bank\Services;

use Bank\Repositories\AccountRepository;
use Bank\Repositories\MovimentRepository;

class DepositService
{
    protected $moviment;

    protected $account;

    public function __construct(MovimentRepository $movimentRepository, AccountRepository $accountRepository)
    {
        $this->moviment = $movimentRepository;
        $this->account = $accountRepository;
    }

    public function depositSave($input):array
    {
        $account = $this->account->find(1);

        $inputCustom = $this->inputCustom($input);
        $inputCustom['acco_balance'] = $this->deposit((float)$account->acco_balance, (float)$input['value']);

        $outputCustom = $this->outputCustom($this->moviment->save($inputCustom));

        return $outputCustom;
    }

    public function deposit(float $balance, float $value)
    {
        $balanceFinal = $balance + $value;

        return $balanceFinal;
    }

    protected function inputCustom(array $input):array
    {
        $date = new \DateTime();

        return [
            'movi_value' => $input['value'],
            'movi_date' => $date,
            'cod_account' => 1,
            'cod_type_drive' => 3, //saque
        ];
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
