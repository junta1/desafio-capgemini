<?php

namespace Bank\Models;

use Illuminate\Database\Eloquent\Model;

class ClientModel extends Model
{
    protected $table = 'client';

    protected $primaryKey = 'clie_id';

    protected $fillable = [
        'clie_name',
        'clie_phone',
        'clie_cpf',
    ];
}
