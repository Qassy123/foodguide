<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Foods extends BaseController
{
    // Displays list of foods
    public function index()
    {
        // Store food items in an array
        $data['foods'] = ['Burger', 'Pizza', 'Curry'];

        // Load the foods view and pass data
        return view('foods/index', $data);
    }

    // Displays a single food item
    public function show($name)
    {
        // Format the food name
        $data['food'] = ucfirst($name);

        // Load the single food view
        return view('foods/show', $data);
    }
}