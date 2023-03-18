<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelQuestionGroupIP extends Model
{
    protected $table = 'questionsgroupip';
    // protected $primaryKey = 'ip_address';

    protected $allowedFields = [
        'ip',
        'created_at',
        'read',
        'accept'
    ];
}
