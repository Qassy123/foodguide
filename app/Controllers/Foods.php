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
}