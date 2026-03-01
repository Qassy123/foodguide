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

    // Stores new takeaway with validation
    public function store()
    {
        $model = new TakeawayModel();

        // Define validation rules
        $rules = [
            'name' => 'required|min_length[3]',
            'cuisine_type' => 'required',
            'address' => 'required',
            'price_range' => 'required',
            'rating' => 'required|decimal|greater_than_equal_to[0]|less_than_equal_to[5]',
            'description' => 'required|min_length[5]'
        ];

        // Run validation
        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Save validated data
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