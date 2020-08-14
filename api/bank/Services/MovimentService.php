<?php
declare(strict_types=1);

namespace Bank\Services;

use Bank\Repositories\MovimentRepository;

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

        foreach ($outputs as $output) {
            $outputCustom[] = $this->outputCustom($output);
        }

        return $outputCustom;
    }

    public function outputCustom($output): array
    {
        return [
            'idMoviment' => $output['movi_id'],
            'date' => $output['movi_date'],
            'value' => $output['movi_value'],
            'typeDrive' => $output['cod_type_drive'],
            'account' => $output['cod_account']
        ];
    }
}
