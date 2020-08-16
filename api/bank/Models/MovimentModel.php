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

    public $timestamps;

    public function typeDrive()
    {
        return $this->belongsTo(TypeDriveModel::class, 'cod_type_drive');
    }

    public function account()
    {
        return $this->belongsTo(AccountModel::class, 'cod_account');
    }
}
