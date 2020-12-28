<?php

    namespace App\Controllers;

    use App\Models\Leaver_Model;
    use App\Models\Department_Model;
    use App\Models\Hardware_Model;
    use App\Models\Leaver_Hardware_MTM_Model;

    class Leaver extends BaseController
    {
        // Show list
        public function index()
        {
            $model = new Leaver_Model();

            $this->loadMainView($model, 'leave_date ASC', 'leaver/leaver_view', 'leaver');
        }

        // Add form
        public function create()
        {
            $data = $this->getViewData();
            $this->loadAddView('leaver/add_leaver', $data);
        }

        // Edit form
        public function edit($id)
        {
            $data = $this->getViewData($id);
            $model = new Leaver_Model();

            $this->loadEditView($model, $id, 'leaver/add_leaver', 'leaver', $data);
        }

        public function store()
        {
            $formData = $this->getPostData();
            $model = new Leaver_Model();

            $id = $this->saveRecord($model, $formData);

            if($id)
            {
                $this->updateManyToMany($id, 'Hardware');
                return $this->response->redirect(site_url('leaver'));
            }
        }

        // Update record
        public function update($id)
        {
            $formData = $this->getPostData($id);
            $model = new Leaver_Model();

            $id = $this->saveRecord($model, $formData);

            if($id)
            {
                $this->updateManyToMany($id, 'Hardware');
                return $this->response->redirect(site_url('leaver'));
            }
        }

        // Delete record
        public function delete($id)
        {
            $model = new Leaver_Model();

            $this->deleteRecord($model, 'id', $id, 'leaver');

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
                'leave_date'                => $this->getVarNull('leave_date'),
                'employee_staff_num'        => $this->getVarNull('employee_staff_num'),
                'employee_full_name'        => $this->getVarNull('employee_full_name'),
                'employee_job_title'        => $this->getVarNull('employee_job_title'),
                'department_id'             => $this->getVarNull('department_id'),
                'manager_full_name'         => $this->getVarNull('manager_full_name'),
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
            $depModel = new Department_Model;
            $hdwModel = new Hardware_Model;

            // Create MTM models
            $hdwMtmModel = new Leaver_Hardware_MTM_Model();

            // For drop-down menus
            $data['department'] = $this->getList($depModel, "department", "department ASC", "Select leaver's department");

            // For checkbox groups
            $data['hardware'] = $this->getList($hdwModel, "hardware", "hardware ASC", null);

            // For checkbox groups (current values)
            $data['hardwareMtm'] = $this->getMtmList($hdwMtmModel, $id, 'leaver_id', 'hardware_id');

            return $data;
        }

        public function updateManyToMany($id, $model)
        {
            switch($model)
            {

                case "Hardware":

                    // Create model object for inserts/deletes
                    $mtmModel = new Leaver_Hardware_MTM_Model();

                    // Retrieve array of Hardware for the Leaver
                    $mtm = $this->getMtmList($mtmModel, $id, 'leaver_id', 'hardware_id');

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
                        'leaver_id'    => $id,
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
                    $mtmModel->where('leaver_id', $id)->where($column, $mtm[$i])->delete();
                }
            }
        }



    }



?>
