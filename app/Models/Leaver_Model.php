<?php

    namespace App\Models;

    use CodeIgniter\Model;

    class Leaver_Model extends Model
    {
        protected $table           = 'leaver';
        protected $primaryKey      = 'id';

        protected $returnType      = 'object';

        protected $createdField    = 'create_date';
        protected $updatedField    = 'update_date';

        protected $allowedFields   =
        [
            'id',
            'req_full_name',
            'req_email',
            'leave_date',
            'employee_staff_num',
            'employee_full_name',
            'employee_job_title',
            'department_id',
            'manager_full_name',
            'additional_requirements',
            'create_user',
            'update_user'
        ];

        protected $validationRules =
        [
            'req_full_name'          => 'required',
            'req_email'              => 'required|valid_email',
            'leave_date'             => 'required|valid_date',
            'employee_staff_num'     => 'required',
            'employee_full_name'     => 'required',
            'employee_job_title'     => 'required',
            'department_id'          => 'required',
            'manager_full_name'      => 'required',
        ];

        protected $validationMessages =
        [
            'req_full_name'          => ['required' => 'Requester Full Name is a required field'],
            'req_email'              => ['required' => 'Requester Email is a required field', 'valid_email' => 'Requester Email is invalid.'],
            'leave_date'             => ['required' => 'Leave Date is a required field', 'valid_date' => 'Leave date is invalid.'],
            'employee_staff_num'     => ['required' => 'Employee Staff Number is a required field'],
            'employee_full_name'     => ['required' => 'Employee Full Name is a required field'],
            'employee_job_title'     => ['required' => 'Employee Job Title is a required field'],
            'department_id'          => ['required' => 'Department is a required field'],
            'manager_full_name'      => ['required' => 'Manager Full Name is a required field'],
        ];


    }

?>




