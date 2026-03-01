<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\TakeawayModel;

class Takeaways extends BaseController
{
    // Displays all takeaways
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

        if (!$data['takeaway']) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Takeaway not found');
        }

        return view('takeaways/show', $data);
    }

    // Displays create form
    public function create()
    {
        return view('takeaways/create');
    }

    // Stores new takeaway
    public function store()
    {
        $model = new TakeawayModel();

        // Insert takeaway into database
        $model->save([
            'name' => $this->request->getPost('name'),
            'cuisine_type' => $this->request->getPost('cuisine_type'),
            'address' => $this->request->getPost('address'),
            'price_range' => $this->request->getPost('price_range'),
            'rating' => $this->request->getPost('rating'),
            'description' => $this->request->getPost('description')
        ]);

        return redirect()->to('/takeaways');
    }

    // Deletes a takeaway
    public function delete($id)
    {
        $model = new TakeawayModel();

        // Remove record by ID
        $model->delete($id);

        return redirect()->to('/takeaways');
    }

    // Returns filtered takeaways for live search
    public function search()
    {
        $model = new TakeawayModel();
        $query = $this->request->getGet('q');

        $results = $model
            ->like('name', $query)
            ->orLike('cuisine_type', $query)
            ->findAll();

        return $this->response->setJSON($results);
    }
}