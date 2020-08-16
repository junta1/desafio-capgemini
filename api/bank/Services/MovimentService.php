<?php
declare(strict_types=1);

namespace Bank\Services;

use Bank\Repositories\MovimentRepository;
use Illuminate\Database\Eloquent\Model;

class MovimentService
{
    protected $moviment;

    public function __construct(MovimentRepository $movimentRepository)
    {
        $this->moviment = $movimentRepository;
    }

    public function all(int $idAccount)
    {
        $outputs = $this->moviment->all($idAccount);

        $outputCustom = [];
        foreach ($outputs as $output) {
            $outputCustom[] = $this->outputCustom($output);
        }

        return $outputCustom;
    }

    public function outputCustom(Model $output)
    {
        return [
            'idMoviment' => $output->movi_id,
            'date' => $output->movi_date,
            'value' => $output->movi_value,
            'typeDrive' => $output->typeDrive->type_driv_name,
            'agency' => $output->account->acco_agency,
            'accoAccount' => $output->account->acco_account,
        ];
    }
}
