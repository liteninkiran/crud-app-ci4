<?php

    namespace App\Models;

    use CodeIgniter\Model;

    class Application_Model extends Model
    {
        protected $table         = 'application';
        protected $primaryKey    = 'id';

        protected $returnType    = 'object';

        protected $createdField  = 'create_date';
        protected $updatedField  = 'update_date';

        protected $allowedFields =
        [
            'id',
            'application',
            'application_owner_name',
            'application_owner_email'
        ];
    }

?>
