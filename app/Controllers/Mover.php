<?php

    namespace App\Controllers;

    use App\Models\Mover_Model;
    use App\Models\Department_Model;
    use App\Models\Application_Model;
    use App\Models\Hardware_Model;
    use App\Models\Mover_Application_MTM_Model;
    use App\Models\Mover_Hardware_MTM_Model;

    class Mover extends BaseController
    {
        // Show list
        public function index()
        {
            $model = new Mover_Model();

            $this->loadMainView($model, 'move_date ASC', 'mover/mover_view', 'mover');
        }

        // Add form
        public function create()
        {
            $data = $this->getViewData();
            $this->loadAddView('mover/add_mover', $data);
        }

        // Edit form
        public function edit($id)
        {
            $data = $this->getViewData($id);
            $model = new Mover_Model();

            $this->loadEditView($model, $id, 'mover/add_mover', 'mover', $data);
        }

        public function store()
        {
            $formData = $this->getPostData();
            $model = new Mover_Model();

            $id = $this->saveRecord($model, $formData);

            if($id)
            {
                $this->updateManyToMany($id, 'Application');
                $this->updateManyToMany($id, 'Hardware');
                return $this->response->redirect(site_url('mover'));
            }
        }

        // Update record
        public function update($id)
        {
            $formData = $this->getPostData($id);
            $model = new Mover_Model();

            $id = $this->saveRecord($model, $formData);

            if($id)
            {
                $this->updateManyToMany($id, 'Application');
                $this->updateManyToMany($id, 'Hardware');
                return $this->response->redirect(site_url('mover'));
            }
        }

        // Delete record
        public function delete($id)
        {
            $model = new Mover_Model();

            $this->deleteRecord($model, 'id', $id, 'mover');

            if($model->errors())
            {
                // Load the Model's errors
                $data['errors'] = $model->errors();

                // Load the errors view
                $this->loadView('db_error', $data);

                exit();
            }
        }

        private function getPostData($id = null)
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

        private function getViewData($id = null)
        {
            // Create regular models
            $appModel = new Application_Model;
            $depModel = new Department_Model;
            $hdwModel = new Hardware_Model;

            // Create MTM models
            $appMtmModel = new Mover_Application_MTM_Model();
            $hdwMtmModel = new Mover_Hardware_MTM_Model();

            // For drop-down menus
            $data['departmentNew'] = $this->getList($depModel, "department", "department ASC", "Select mover's new department");
            $data['departmentPre'] = $this->getList($depModel, "department", "department ASC", "Select mover's previous department");

            // For checkbox groups
            $data['application'] = $this->getList($appModel, "application", "application ASC", null);
            $data['hardware'] = $this->getList($hdwModel, "hardware", "hardware ASC", null);

            // For checkbox groups (current values)
            $data['hardwareMtm'] = $this->getMtmList($hdwMtmModel, $id, 'mover_id', 'hardware_id');
            $data['applicationMtm'] = $this->getMtmList($appMtmModel, $id, 'mover_id', 'application_id');

            return $data;
        }

        public function updateManyToMany($id, $model)
        {
            switch($model)
            {

                case "Application":

                    // Create model object for inserts/deletes
                    $mtmModel = new Mover_Application_MTM_Model();

                    // Retrieve array of Applications for the Mover
                    $mtm = $this->getMtmList($mtmModel, $id, 'mover_id', 'application_id');

                    // Store column/input name
                    $column = "application_id";
                    $inputName = 'application';

                    break;

                case "Hardware":

                    // Create model object for inserts/deletes
                    $mtmModel = new Mover_Hardware_MTM_Model();

                    // Retrieve array of Hardware for the Mover
                    $mtm = $this->getMtmList($mtmModel, $id, 'mover_id', 'hardware_id');

                    // Store column/input name
                    $column = "hardware_id";
                    $inputName = 'hardware';

                    break;

                default:

                    return;
            }

            // Retrieve checked items
            $items = $this->request->getVar($inputName);

            if($items == null)
            {
                $items = array();
            }

            // Count how many items were checked/selected
            $total = count($items);

            // Loop through array
            for($i = 0; $i < $total; $i++)
            {
                // Insert new records as appropriate
                if(!in_array($items[$i], $mtm))
                {
                    // Store data for insert
                    $data =
                    [
                        'mover_id'    => $id,
                        $column       => $items[$i],
                        'create_user' => get_current_user(),
                        'update_user' => get_current_user()
                    ];

                    // Do insert
                    $mtmModel->insert($data);
                }
            }

            // Count number of records in MTM table
            $total = count($mtm);

            // Loop through array
            for($i = 0; $i < $total; $i++)
            {
                // Delete old records as appropriate
                if(!in_array($mtm[$i], $items))
                {
                    // Do DELETE
                    $mtmModel->where('mover_id', $id)->where($column, $mtm[$i])->delete();
                }
            }
        }



    }



?>
