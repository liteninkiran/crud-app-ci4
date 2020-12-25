<?php

    namespace App\Controllers;

    use App\Models\Application_Model;

    class Application extends BaseController
    {
        // Show list
        public function index()
        {
            $model = new Application_Model();

            $this->loadMainView($model, 'application ASC', 'application/application_view', 'application');
        }

        // Add form
        public function create()
        {
            $this->loadAddView('application/add_application');
        }

        // Edit form
        public function edit($id)
        {
            $model = new Application_Model();

            $this->loadEditView($model, $id, 'application/add_application', 'application');
        }

        public function store()
        {
            $formData = $this->getData();
            $model = new Application_Model();

            $this->saveRecord($model, $formData, 'application', 'application', 'is_unique[application.application]');
        }

        // Update record
        public function update($id)
        {
            $formData = $this->getData($id);
            $model = new Application_Model();

            $this->saveRecord($model, $formData, 'application', 'application', 'is_unique[application.application,id,' . $id . ']');
        }

        // Delete record
        public function delete($id)
        {
            $model = new Application_Model();

            $this->deleteRecord($model, 'id', $id, 'application');
        }

        private function getData($id = null)
        {
            // Check if post variable exists
            $this->checkVar('application');

            // Store data from post
            $data =
            [
                'application'             => $this->getVarNull('application'),
                'application_owner_name'  => $this->getVarNull('application-owner-name'),
                'application_owner_email' => $this->getVarNull('application-owner-email'),
                'update_user'             => get_current_user()
            ];

            $data = $this->parseId($id, $data);

            // Return the data
            return $data;            
        }

    }
?>
