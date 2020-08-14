<?php

namespace Bank\Models;

use Illuminate\Database\Eloquent\Model;

class AccountModel extends Model
{
    protected $table = 'account';

    protected $primaryKey = 'acco_id';

    protected $fillable = [
        'acco_agency',
        'acco_account',
        'acco_balance',
        'cod_client',
        'cod_bank',
    ];

    public function client()
    {
        return $this->belongsTo(ClientModel::class, 'cod_client');
    }

    public function bank()
    {
        return $this->belongsTo(ClientModel::class, 'cod_bank');
    }
}
