<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\TakeawayModel;

class Takeaways extends BaseController
{
    // Displays all takeaways from database
    public function index()
    {
        $model = new TakeawayModel();
        $data['takeaways'] = $model->findAll();

        return view('takeaways/index', $data);
    }

    // Displays a single takeaway by ID
    public function show($id)
    {
        $model = new TakeawayModel();

        // Retrieve one takeaway
        $data['takeaway'] = $model->find($id);

        // Show 404 if not found
        if (!$data['takeaway']) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Takeaway not found');
        }

        return view('takeaways/show', $data);
    }
}