<?php

    namespace App\Controllers;

    use App\Models\Application_Model;

    class Application extends BaseController
    {

        // Show Applications list
        public function index()
        {
            // Create a new Application model
            $model = new Application_Model();
            $orderBy = 'application ASC';
            $viewName = 'application/application_view';
            $objectName = 'application';

            $this->loadMainView($model, $orderBy, $viewName, $objectName);
        }

        // Add Application form
        public function create()
        {
            $this->loadAddView('application/add_application');
        }

        // Edit Application form
        public function edit($id)
        {
            // Create a new Application model
            $model = new Application_Model();
            $viewName = 'application/add_application';
            $objectName = 'application';

            $this->loadEditView($model, $id, $viewName, $objectName);
        }

        public function store()
        {
            $formData = $this->getData();
            $model = new Application_Model();
            $redirect = 'Application';
            $fieldName = 'application';
            $fieldRules = 'is_unique[application.application]';

            $this->saveRecord($model, $formData, $redirect, $fieldName, $fieldRules);
        }

        // Delete Application
        public function delete($id)
        {
            $model = new Application_Model();

            $this->deleteRecord($model, 'id', $id, 'Application');
        }

        // Update Application
        public function update($id)
        {
            $formData = $this->getData($id);
            $model = new Application_Model();
            $redirect = 'Application';
            $fieldName = 'application';
            $fieldRules = 'is_unique[application.application,id,' . $id . ']';

            $this->saveRecord($model, $formData, $redirect, $fieldName, $fieldRules);
        }

        private function getData($id = null)
        {
            // Check if post variable exists
            $this->checkVar('application');

            // Store data from post
            $data =
            [
                'application'             => $this->request->getVar('application'),
                'application_owner_name'  => $this->request->getVar('application-owner-name'),
                'application_owner_email' => $this->request->getVar('application-owner-email'),
                'update_user'             => get_current_user()
            ];

            // If we got passed an ID, include it and the create user
            if($id)
            {
                $data['id'] = $id;
                $data['create_user'] = get_current_user();
            }

            // Return the data
            return $data;            
        }

    }
?>
