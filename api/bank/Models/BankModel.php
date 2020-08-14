<?php

namespace Bank\Models;

use Illuminate\Database\Eloquent\Model;

class BankModel extends Model
{
    protected $table = 'bank';

    protected $primaryKey = 'bank_id';

    protected $fillable = [
        'bank_name',
        'bank_code'
    ];
}
