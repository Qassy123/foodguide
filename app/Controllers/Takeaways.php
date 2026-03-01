<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\TakeawayModel;

class Takeaways extends BaseController
{
    // Displays all takeaways from database
    public function index()
    {
        // Create model instance
        $model = new TakeawayModel();

        // Retrieve all records
        $data['takeaways'] = $model->findAll();

        // Load view and pass data
        return view('takeaways/index', $data);
    }
}