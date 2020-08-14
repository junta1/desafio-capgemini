<?php

namespace Bank\Models;

use Illuminate\Database\Eloquent\Model;

class TypeDriveModel extends Model
{
    protected $table = 'type_drive';

    protected $primaryKey = 'type_driv_id';

    protected $fillable = [
        'type_driv_name'
    ];
}
