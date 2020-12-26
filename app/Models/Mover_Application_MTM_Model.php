<?php

    namespace App\Models;

    use CodeIgniter\Model;

    class Mover_Application_MTM_Model extends Model
    {
        protected $table         = 'mover_app_mtm';
        protected $primaryKey    = 'id';

        protected $returnType    = 'object';

        protected $useTimestamps = true;

        protected $createdField  = 'create_date';
        protected $updatedField  = 'update_date';

        protected $allowedFields =
        [
            'id',
            'mover_id',
            'application_id'
        ];
    }
?>
