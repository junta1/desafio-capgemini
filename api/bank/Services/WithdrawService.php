<?php
declare(strict_types=1);

namespace Bank\Services;

use Bank\Repositories\AccountRepository;
use Bank\Repositories\MovimentRepository;
use Illuminate\Database\Eloquent\Model;

class WithdrawService
{
    protected $moviment;

    protected $account;

    const WITHDRAW = 1;

    public function __construct(MovimentRepository $movimentRepository, AccountRepository $accountRepository)
    {
        $this->moviment = $movimentRepository;
        $this->account = $accountRepository;
    }

    public function withdrawSave($input):array
    {
        $account = $this->account->find($input['codAccount']);
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
            'movi_value' => number_format((float)$input['value'], 2, '.', ','),
            'movi_date' => $date,
            'cod_account' => $input['codAccount'],
            'cod_type_drive' => self::WITHDRAW, //saque
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
