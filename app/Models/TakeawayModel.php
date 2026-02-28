<?php

namespace App\Models;

use CodeIgniter\Model;

class TakeawayModel extends Model
{
    protected $table = 'takeaways';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'category', 'description'];
}