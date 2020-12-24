<?php

    namespace App\Models;

    use CodeIgniter\Model;

    class Application_Model extends Model
    {
        protected $table           = 'application';
        protected $primaryKey      = 'id';

        protected $returnType      = 'object';

        protected $createdField    = 'create_date';
        protected $updatedField    = 'update_date';

        protected $allowedFields   =
        [
            'id',
            'application',
            'application_owner_name',
            'application_owner_email',
            'create_user',
            'update_user'
        ];

        protected $validationRules =
        [
            'application'              => 'required',
            'application_owner_name'   => 'required',
            'application_owner_email'  => 'required|valid_email'
        ];

        protected $validationMessages =
        [
            'application'             => ['required' => 'Application is a required field', 'is_unique' => 'The application has already been entered into the database.'],
            'application_owner_name'  => ['required' => 'Application Owner Name is a required field'],
            'application_owner_email' => ['required' => 'Application Owner Email is a required field', 'valid_email' => 'Must be a valid email address.']
        ];


    }

?>
