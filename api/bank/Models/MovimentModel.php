<?php

namespace Bank\Models;

use Illuminate\Database\Eloquent\Model;

class MovimentModel extends Model
{
    protected $table = 'moviment';

    protected $primaryKey = 'movi_id';

    protected $fillable = [
        'movi_date',
        'movi_value',
        'cod_type_drive',
        'cod_account',
    ];

    public function typeDrive()
    {
        return $this->belongsTo(TypeDriveModel::class);
    }

    public function account()
    {
        return $this->belongsTo(AccountModel::class);
    }
}
