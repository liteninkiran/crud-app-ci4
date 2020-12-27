<?php

    namespace App\Controllers;

    use App\Models\Joiner_Model;
    use App\Models\Department_Model;
    use App\Models\Application_Model;
    use App\Models\Hardware_Model;
    use App\Models\Joiner_Application_MTM_Model;
    use App\Models\Joiner_Hardware_MTM_Model;

    class Joiner extends BaseController
    {
        // Show list
        public function index()
        {
            $model = new Joiner_Model();

            $this->loadMainView($model, 'join_date ASC', 'joiner/joiner_view', 'joiner');
        }

        // Add form
        public function create()
        {
            $data = $this->getViewData();
            $this->loadAddView('joiner/add_joiner', $data);
        }

        // Edit form
        public function edit($id)
        {
            $data = $this->getViewData($id);
            $model = new Joiner_Model();

            $this->loadEditView($model, $id, 'joiner/add_joiner', 'joiner', $data);
        }

        public function store()
        {
            $formData = $this->getPostData();
            $model = new Joiner_Model();

            $id = $this->saveRecord($model, $formData);

            if($id)
            {
                $this->updateManyToMany($id, 'Application');
                $this->updateManyToMany($id, 'Hardware');
                return $this->response->redirect(site_url('joiner'));
            }
        }

        // Update record
        public function update($id)
        {
            $formData = $this->getPostData($id);
            $model = new Joiner_Model();

            $id = $this->saveRecord($model, $formData);

            if($id)
            {
                $this->updateManyToMany($id, 'Application');
                $this->updateManyToMany($id, 'Hardware');
                return $this->response->redirect(site_url('joiner'));
            }
        }

        // Delete record
        public function delete($id)
        {
            $model = new Joiner_Model();

            $this->deleteRecord($model, 'id', $id, 'joiner');
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
                'join_date'                 => $this->getVarNull('join_date'),
                'employee_staff_num'        => $this->getVarNull('employee_staff_num'),
                'employee_full_name'        => $this->getVarNull('employee_full_name'),
                'employee_job_title'        => $this->getVarNull('employee_job_title'),
                'department_id'             => $this->getVarNull('department_id'),
                'manager_full_name'         => $this->getVarNull('manager_full_name'),
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
            $appMtmModel = new Joiner_Application_MTM_Model();
            $hdwMtmModel = new Joiner_Hardware_MTM_Model();

            // For drop-down menus
            $data['department'] = $this->getList($depModel, "department", "department ASC", "Select joiner's department");

            // For checkbox groups
            $data['application'] = $this->getList($appModel, "application", "application ASC", null);
            $data['hardware'] = $this->getList($hdwModel, "hardware", "hardware ASC", null);

            // For checkbox groups (current values)
            $data['hardwareMtm'] = $this->getMtmList($hdwMtmModel, $id, 'joiner_id', 'hardware_id');
            $data['applicationMtm'] = $this->getMtmList($appMtmModel, $id, 'joiner_id', 'application_id');

            return $data;
        }

        public function updateManyToMany($id, $model)
        {
            switch($model)
            {

                case "Application":

                    // Create model object for inserts/deletes
                    $mtmModel = new Joiner_Application_MTM_Model();

                    // Retrieve array of Applications for the Joiner
                    $mtm = $this->getMtmList($mtmModel, $id, 'joiner_id', 'application_id');

                    // Store column/input name
                    $column = "application_id";
                    $inputName = 'application';

                    break;

                case "Hardware":

                    // Create model object for inserts/deletes
                    $mtmModel = new Joiner_Hardware_MTM_Model();

                    // Retrieve array of Hardware for the Joiner
                    $mtm = $this->getMtmList($mtmModel, $id, 'joiner_id', 'hardware_id');

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
                        'joiner_id'    => $id,
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
                    $mtmModel->where('joiner_id', $id)->where($column, $mtm[$i])->delete();
                }
            }
        }



    }



?>
