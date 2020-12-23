<?php

    namespace App\Controllers;

    use App\Models\Application_Model;

    class Application extends BaseController
    {
        // Show Applications list
        public function index()
        {
            // Create a new Application model
            $appModel = new Application_Model();

            // Return all Applications
            $apps = $appModel->orderBy('application', 'ASC')->findAll();

            // Store in data array
            $data['application'] = $apps;

            // Load the view
            echo view('template/header');
            echo view('application/application_view', $data);
            echo view('template/footer');
        }

        // Add Application form
        public function create()
        {
            echo view('template/header');
            echo view('application/add_application');
            echo view('template/footer_form');
        }

        // Edit Application form
        public function edit($id)
        {
            // Create a new Application model
            $appModel = new Application_Model();

            // Return the Applications
            $app = $appModel->find($id);

            // Store in data array
            $data['application'] = $app;

            echo view('template/header');
            echo view('application/add_application', $data);
            echo view('template/footer_form');
        }

        // Insert data
        public function store()
        {
            $appModel = new Application_Model();
            $data = $this->getData();
            $appModel->insert($data);

            return $this->response->redirect(site_url('public/application'));
        }

        // Delete Application
        public function delete($id = null)
        {
            $appModel = new Application_Model();
            $appModel->where('id', $id)->delete($id);

            return $this->response->redirect(site_url('public/application'));
        }

        // Update Application
        public function update($id)
        {
            $appModel = new Application_Model();
            $data = $this->getData();
            $appModel->update($id, $data);

            return $this->response->redirect(site_url('public/application'));
        }

        private function getData()
        {
            $data =
            [
                'application'             => $this->request->getVar('application'),
                'application_owner_name'  => $this->request->getVar('application-owner-name'),
                'application_owner_email' => $this->request->getVar('application-owner-email')
            ];

            return $data;            
        }

    }
?>
