<?php

    namespace App\Controllers;

    use App\Models\Department_Model;

    class Department extends BaseController
    {
        // Show list
        public function index()
        {
            $model = new Department_Model();

            $this->loadMainView($model, 'department ASC', 'department/department_view', 'department');
        }

        // Add form
        public function create()
        {
            $this->loadAddView('department/add_department');
        }

        // Edit form
        public function edit($id)
        {
            $model = new Department_Model();

            $this->loadEditView($model, $id, 'department/add_department', 'department');
        }

        public function store()
        {
            $formData = $this->getPostData();
            $model = new Department_Model();

            $id = $this->saveRecord($model, $formData, 'department', 'is_unique[department.department]');

            if($id)
            {
                return $this->response->redirect(site_url('department'));
            }
        }

        // Update record
        public function update($id)
        {
            $formData = $this->getPostData($id);
            $model = new Department_Model();

            $id = $this->saveRecord($model, $formData, 'department', 'is_unique[department.department,id,' . $id . ']');

            if($id)
            {
                return $this->response->redirect(site_url('department'));
            }
        }

        // Delete record
        public function delete($id)
        {
            $model = new Department_Model();
            $this->deleteRecord($model, 'id', $id, 'department');
        }

        private function getPostData($id = null)
        {
            // Check if post variable exists
            $this->checkVar('department');

            // Store data from post
            $data =
            [
                'department'  => $this->getVarNull('department'),
                'update_user' => get_current_user()
            ];

            $data = $this->parseId($id, $data);

            // Return the data
            return $data;            
        }

    }
?>
