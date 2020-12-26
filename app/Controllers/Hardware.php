<?php

    namespace App\Controllers;

    use App\Models\Hardware_Model;

    class Hardware extends BaseController
    {
        // Show list
        public function index()
        {
            $model = new Hardware_Model();

            $this->loadMainView($model, 'hardware ASC', 'hardware/hardware_view', 'hardware');
        }

        // Add form
        public function create()
        {
            $this->loadAddView('hardware/add_hardware');
        }

        // Edit form
        public function edit($id)
        {
            $model = new Hardware_Model();

            $this->loadEditView($model, $id, 'hardware/add_hardware', 'hardware');
        }

        public function store()
        {
            $formData = $this->getPostData();
            $model = new Hardware_Model();

            $this->saveRecord($model, $formData, 'hardware', 'hardware', 'is_unique[hardware.hardware]');
        }

        // Update record
        public function update($id)
        {
            $formData = $this->getPostData($id);
            $model = new Hardware_Model();

            $this->saveRecord($model, $formData, 'hardware', 'hardware', 'is_unique[hardware.hardware,id,' . $id . ']');
        }

        // Delete record
        public function delete($id)
        {
            $model = new Hardware_Model();

            $this->deleteRecord($model, 'id', $id, 'hardware');
        }

        private function getPostData($id = null)
        {
            // Check if post variable exists
            $this->checkVar('hardware');

            // Store data from post
            $data =
            [
                'hardware'    => $this->getVarNull('hardware'),
                'update_user' => get_current_user()
            ];

            $data = $this->parseId($id, $data);

            // Return the data
            return $data;            
        }

    }
?>
