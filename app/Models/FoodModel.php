<?php

namespace App\Models;

use CodeIgniter\Model;

class FoodModel extends Model
{
    protected $table = 'foods';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'description'];

    // Returns all foods
    public function getFoods()
    {
        return $this->findAll();
    }

    // Returns single food by name
    public function getFoodByName($name)
    {
        return $this->where('name', $name)->first();
    }
}