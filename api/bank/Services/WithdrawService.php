<?php
declare(strict_types=1);

namespace Bank\Services;

use Bank\Repositories\AccountRepository;
use Bank\Repositories\MovimentRepository;

class WithdrawService
{
    protected $moviment;

    protected $account;

    public function __construct(MovimentRepository $movimentRepository, AccountRepository $accountRepository)
    {
        $this->moviment = $movimentRepository;
        $this->account = $accountRepository;
    }

    public function withdrawSave($input):array
    {
        $account = $this->account->find(1);

        $inputCustom = $this->inputCustom($input);
        $inputCustom['acco_balance'] = $this->withdraw((float)$account->acco_balance, (float)$input['value']);

        $outputCustom = $this->outputCustom($this->moviment->save($inputCustom));

        return $outputCustom;
    }

    protected function withdraw(float $balance, float $value): float
    {
        $balanceFinal = 0.0;

        if ($balance > 0.0 && $balance >= $value) {
            $balanceFinal = $balance - $value;
        } else {
            throw new \Exception('O saldo é insuficiente!');
        }

        return $balanceFinal;
    }

    protected function inputCustom(array $input):array
    {
        $date = new \DateTime();

        return [
            'movi_value' => $input['value'],
            'movi_date' => $date,
            'cod_account' => 1,
            'cod_type_drive' => 1, //saque
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
