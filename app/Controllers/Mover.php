<?php

    namespace App\Controllers;

    use App\Models\Mover_Model;
    use App\Models\Department_Model;

    class Mover extends BaseController
    {
        // Show list
        public function index()
        {
            $model = new Mover_Model();

            $this->loadMainView($model, 'mover ASC', 'mover/mover_view', 'mover');
        }

        // Add form
        public function create()
        {
            $model = new Department_Model();
            $list = $this->getList($model, "department", "department ASC", "Select mover's new department");
            $data['departmentNew'] = $list;
            $this->loadAddView('mover/add_mover', $data);
        }

        // Edit form
        public function edit($id)
        {
            $model = new Mover_Model();

            $this->loadEditView($model, $id, 'mover/add_mover', 'mover');
        }

        public function store()
        {
            $formData = $this->getData();
            $model = new Mover_Model();

            $this->saveRecord($model, $formData, 'mover', 'mover', 'is_unique[mover.mover]');
        }

        // Update record
        public function update($id)
        {
            $formData = $this->getData($id);
            $model = new Mover_Model();

            $this->saveRecord($model, $formData, 'mover', 'mover', 'is_unique[mover.mover,id,' . $id . ']');
        }

        // Delete record
        public function delete($id)
        {
            $model = new Mover_Model();

            $this->deleteRecord($model, 'id', $id, 'mover');
        }

        private function getData($id = null)
        {
            // Check if post variable exists
            $this->checkVar('req_full_name');

            // Store data from post
            $data =
            [
                'req_full_name'             => $this->getVarNull('req_full_name'),
                'req_email'                 => $this->getVarNull('req_email'),
                'move_date'                 => $this->getVarNull('move_date'),
                'employee_staff_num'        => $this->getVarNull('employee_staff_num'),
                'employee_full_name'        => $this->getVarNull('employee_full_name'),
                'employee_job_title'        => $this->getVarNull('employee_job_title'),
                'department_new_id'         => $this->getVarNull('department_new_id'),
                'department_prev_id'        => $this->getVarNull('department_prev_id'),
                'new_manager_full_name'     => $this->getVarNull('new_manager_full_name'),
                'prev_manager_full_name'    => $this->getVarNull('prev_manager_full_name'),
                'employment_type'           => $this->getVarNull('employment_type'),
                'contract_end_date'         => $this->getVarNull('contract_end_date'),
                'remote_access'             => $this->getVarNull('remote_access'),
                'usb_usage'                 => $this->getVarNull('usb_usage'),
                'usb_usage_reason'          => $this->getVarNull('usb_usage_reason'),
                'additional_requirements'   => $this->getVarNull('additional_requirements'),
                'update_user'               => get_current_user()
            ];

            $data = $this->parseId($id, $data);

            // Return the data
            return $data;            
        }
    }
?>
