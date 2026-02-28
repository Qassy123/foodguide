<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\FoodModel;

class Foods extends BaseController
{
    // Displays list of foods
    public function index()
    {
        // Create model instance
        $model = new FoodModel();

        // Get food data from model
        $data['foods'] = $model->getFoods();

        // Load the foods view
        return view('foods/index', $data);
    }

    // Displays a single food item
    public function show($name)
    {
        // Format food name
        $data['food'] = ucfirst($name);

        // Load single food view
        return view('foods/show', $data);
    }
}