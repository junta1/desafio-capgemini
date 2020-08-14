<?php
declare(strict_types=1);

namespace Bank\Repositories;

use Bank\Models\AccountModel;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Model;

class AccountRepository
{
    protected $account;

    public function __construct(AccountModel $accountModel)
    {
        $this->account = $accountModel;
    }

    public function all():Paginator
    {
        $data = $this->account
            ->with([
                'client',
                'bank'
            ])
            ->orderBy('acco_account', 'asc')
            ->paginate(5);

        return $data;
    }

    public function find(int $id): Model
    {
        $data = $this->account
            ->where('acco_id', '=', $id)
            ->first();

        if (!$data) {
            throw new \Exception('Data not found!');
        }

        return $data;
    }

}
