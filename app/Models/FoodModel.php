<?php

namespace App\Models;

use CodeIgniter\Model;

class FoodModel extends Model
{
    // Returns all foods
    public function getFoods()
    {
        return ['Burger', 'Pizza', 'Curry'];
    }
}