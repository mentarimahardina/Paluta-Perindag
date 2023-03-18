<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelStaff extends Model
{
    protected $table = 'organisasidetail';
    protected $primaryKey = 'id_org';

    protected $allowedFields = [
        'id_employee',
        'jabatan',
        'full_name',
        'photo',
        'createBy'
    ];
}
