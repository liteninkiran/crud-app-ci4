<?php

    namespace App\Models;

    use CodeIgniter\Model;

    class Department_Model extends Model
    {
        protected $table           = 'department';
        protected $primaryKey      = 'id';

        protected $returnType      = 'object';

        protected $createdField    = 'create_date';
        protected $updatedField    = 'update_date';

        protected $allowedFields   =
        [
            'id',
            'department',
            'create_user',
            'update_user'
        ];

        protected $validationRules =
        [
            'department'              => 'required',
        ];

        protected $validationMessages =
        [
            'department'             => ['required' => 'Department is a required field', 'is_unique' => 'The department has already been entered into the database.'],
        ];


    }

?>
