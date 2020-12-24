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
            // Retrieve the form data
            $formData = $this->getData();

            // Create a Model
            $appModel = new Application_Model();

            // Insert the record, return the ID
            $id = $appModel->insert($formData);

            // If we git an ID back, redirect to main view
            if($id)
            {
                return $this->response->redirect(site_url('public_html/application'));
            }
            else
            {
                // Load the Model's errors
                $data['errors'] = $appModel->errors();

                // Load the form data
                $data['formData'] = $formData;

                // Load the errors view
                echo view('template/header');
                echo view('db_error', $data);
                echo view('template/footer');
            }
        }

        // Delete Application
        public function delete($id = null)
        {
            $appModel = new Application_Model();
            $appModel->where('id', $id)->delete($id);

            return $this->response->redirect(site_url('public_html/application'));
        }

        // Update Application
        public function update($id)
        {
            $formData = $this->getData();

            $appModel = new Application_Model();

            $fieldName = 'application';
            $fieldRules = 'is_unique[application.application,id,' . $id . ']';

            $appModel->setValidationRule($fieldName, $fieldRules);

            // Return the Applications
            $app = $appModel->find($id);

            $appModel->update($id, $formData);

            if($appModel->errors())
            {
                // Load the Model's errors
                $data['errors'] = $appModel->errors();

                // Load the form data
                $data['formData'] = $formData;

                // Load the errors view
                echo view('template/header');
                echo view('db_error', $data);
                echo view('template/footer');
            }
            else
            {
                return $this->response->redirect(site_url('public_html/application'));
            }
        }

        private function getData()
        {
            if($this->request->getVar('application') == null)
            {
                echo view('template/header');
                echo view('unauthorised');
                echo view('template/footer');

                exit();
            }

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
