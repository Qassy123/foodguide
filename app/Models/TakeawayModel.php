<?php

namespace App\Models;

use CodeIgniter\Model;

class TakeawayModel extends Model
{
    // Defines the database table
    protected $table = 'takeaways';

    // Defines the primary key
    protected $primaryKey = 'id';

    // Allows auto incrementing IDs
    protected $useAutoIncrement = true;

    // Defines return type as array
    protected $returnType = 'array';

    // Allows these fields to be inserted or updated
    protected $allowedFields = [
        'name',
        'cuisine_type',
        'address',
        'price_range',
        'rating',
        'description'
    ];
}