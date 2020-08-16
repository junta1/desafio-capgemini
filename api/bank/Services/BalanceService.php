<?php
declare(strict_types=1);

namespace Bank\Services;

use Bank\Repositories\AccountRepository;
use Illuminate\Database\Eloquent\Model;

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
