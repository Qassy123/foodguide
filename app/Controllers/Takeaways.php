<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\TakeawayModel;

class Takeaways extends BaseController
{
    // Displays list of takeaways
    public function index()
    {
        $model = new TakeawayModel();
        $data['takeaways'] = $model->findAll();

        return view('takeaways/index', $data);
    }

    // Displays single takeaway
    public function show($id)
    {
        $model = new TakeawayModel();
        $data['takeaway'] = $model->find($id);

        return view('takeaways/show', $data);
    }
}