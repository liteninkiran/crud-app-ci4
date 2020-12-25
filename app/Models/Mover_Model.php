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

    }

?>




