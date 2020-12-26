<?php

    namespace App\Models;

    use CodeIgniter\Model;

    class Mover_Model extends Model
    {
        protected $table           = 'mover';
        protected $primaryKey      = 'id';

        protected $returnType      = 'object';

        protected $createdField    = 'create_date';
        protected $updatedField    = 'update_date';

        protected $allowedFields   =
        [
            'id',
            'req_full_name',
            'req_email',
            'move_date',
            'employee_staff_num',
            'employee_full_name',
            'employee_job_title',
            'department_new_id',
            'department_prev_id',
            'new_manager_full_name',
            'prev_manager_full_name',
            'employment_type',
            'contract_end_date',
            'remote_access',
            'usb_usage',
            'usb_usage_reason',
            'additional_requirements',
            'create_user',
            'update_user'
        ];

        protected $validationRules =
        [
            'req_full_name'          => 'required',
            'req_email'              => 'required|valid_email',
            'move_date'              => 'required|valid_date',
            'employee_staff_num'     => 'required',
            'employee_full_name'     => 'required',
            'employee_job_title'     => 'required',
            'department_new_id'      => 'required',
            'department_prev_id'     => 'required',
            'new_manager_full_name'  => 'required',
            'prev_manager_full_name' => 'required',
            'employment_type'        => 'required',
            'remote_access'          => 'required',
            'usb_usage'              => 'required',
        ];

        protected $validationMessages =
        [
            'req_full_name'          => ['required' => 'Requester Full Name is a required field'],
            'req_email'              => ['required' => 'Requester Email is a required field', 'valid_email' => 'Requester Email is invalid.'],
            'move_date'              => ['required' => 'Move Date is a required field', 'valid_date' => 'Move date is invalid.'],
            'employee_staff_num'     => ['required' => 'Employee Staff Number is a required field'],
            'employee_full_name'     => ['required' => 'Employee Full Name is a required field'],
            'employee_job_title'     => ['required' => 'Employee Job Title is a required field'],
            'department_new_id'      => ['required' => 'New Department is a required field'],
            'department_prev_id'     => ['required' => 'Previous Department is a required field'],
            'new_manager_full_name'  => ['required' => 'New Manager Full Name is a required field'],
            'prev_manager_full_name' => ['required' => 'Previous Manager Full Name is a required field'],
            'employment_type'        => ['required' => 'Employment Type is a required field'],
            'remote_access'          => ['required' => 'Remote Access is a required field'],
            'usb_usage'              => ['required' => 'USB Usage is a required field'],
        ];


    }

?>




