<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\FoodModel;

class Foods extends BaseController
{
    // Displays list of foods
    public function index()
    {
        $model = new FoodModel();
        $data['foods'] = $model->getFoods();

        return view('foods/index', $data);
    }

    // Displays single food item
    public function show($name)
    {
        $model = new FoodModel();
        $data['food'] = $model->getFoodByName($name);

        return view('foods/show', $data);
    }
}