<?php
declare(strict_types=1);

namespace Bank\Services;

use Bank\Repositories\AccountRepository;
use Bank\Repositories\MovimentRepository;
use Illuminate\Database\Eloquent\Model;

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
        $account = $this->account->find($input['codAccount']);

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
            'cod_account' => $input['codAccount'],
            'cod_type_drive' => 2, //deposit
        ];
    }

    public function outputCustom(Model $output): array
    {

        return [
            'idAccount' => $output->acco_id,
            'agency' => $output->acco_agency,
            'account' => $output->acco_account,
            'balance' => number_format((float)$output->acco_balance, 2, ',', ''),
            'idBank' => $output->cod_bank,
            'bank' => $output->bank->bank_name,
            'idClient' => $output->cod_client,
            'client' => $output->client->clie_name,
        ];
    }
}
