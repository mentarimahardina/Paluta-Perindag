<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelProdukPrice extends Model
{
    protected $table = 'updateproduk';
    protected $primaryKey = 'id';
    
    protected $allowedFields = [        
        'idProduk',
        'price',
        'date',
        'created_at',
        'created_by',
    ];
}
