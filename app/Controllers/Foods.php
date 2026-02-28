<?php

namespace App\Controllers;

class Foods extends BaseController
{
    public function index()
    {
        // Data for the page (hardcoded for now)
        $data = [
            'title' => 'Food Guide',
            'foods' => ['Burger', 'Pizza', 'Curry']
        ];

        // Load a view and pass it $data
        return view('foods_list', $data);
    }
}