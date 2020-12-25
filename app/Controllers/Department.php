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
            $formData = $this->getData();
            $model = new Department_Model();

            $this->saveRecord($model, $formData, 'department', 'department', 'is_unique[department.department]');
        }

        // Update record
        public function update($id)
        {
            $formData = $this->getData($id);
            $model = new Department_Model();

            $this->saveRecord($model, $formData, 'department', 'department', 'is_unique[department.department,id,' . $id . ']');
        }

        // Delete record
        public function delete($id)
        {
            $model = new Department_Model();

            $this->deleteRecord($model, 'id', $id, 'department');
        }

        private function getData($id = null)
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
