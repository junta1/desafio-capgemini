<?php
declare(strict_types=1);

namespace Bank\Repositories;

use Bank\Models\AccountModel;
use Bank\Models\MovimentModel;
use Bank\Models\TypeDriveModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class MovimentRepository
{
    protected $moviment;

    protected $account;

    protected $typeDrive;

    protected $fields = [
        'movi_date',
        'movi_value',
        'cod_type_drive',
        'cod_account',
    ];

    public function __construct(MovimentModel $movimentModel,
                                AccountModel $accountModel,
                                TypeDriveModel $typeDriveModel)
    {
        $this->moviment = $movimentModel;
        $this->account = $accountModel;
        $this->typeDrive = $typeDriveModel;
    }

    public function all($id)
    {
        return $this->moviment
            ->where('cod_account', '=', $id)
            ->orderBy('movi_date', 'asc')
            ->paginate(5);
    }

    public function save($input): Model
    {
        return DB::transaction(function () use ($input) {

            $account = $this->account->find($input['cod_account']);

            if (!$account) {
                throw new \Exception('Conta não encontrada!');
            }

            $typeDrive = $this->typeDrive->find($input['cod_type_drive']);

            if (!$typeDrive) {
                throw new \Exception('Tipo de movimentação não encontrada!');
            }

            foreach ($this->fields as $field) {
                if (isset($input[$field])) {
                    $this->moviment->{$field} = $input[$field];
                }
            }

            $this->moviment->save();

            $account->acco_balance = $input['acco_balance'];

            $account->save();

            return $account;
        });
    }
}
