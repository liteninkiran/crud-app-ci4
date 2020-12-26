<?php

    namespace App\Models;

    use CodeIgniter\Model;

    class Hardware_Model extends Model
    {
        protected $table           = 'hardware';
        protected $primaryKey      = 'id';

        protected $returnType      = 'object';

        protected $createdField    = 'create_date';
        protected $updatedField    = 'update_date';

        protected $allowedFields   =
        [
            'id',
            'hardware',
            'create_user',
            'update_user'
        ];

        protected $validationRules =
        [
            'hardware'              => 'required',
        ];

        protected $validationMessages =
        [
            'hardware'              => ['required' => 'Hardware is a required field', 'is_unique' => 'The hardware has already been entered into the database.'],
        ];


    }

?>
