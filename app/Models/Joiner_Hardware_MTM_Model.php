<?php

    namespace App\Models;

    use CodeIgniter\Model;

    class Joiner_Hardware_MTM_Model extends Model
    {
        protected $table         = 'joiner_hdw_mtm';
        protected $primaryKey    = 'id';

        protected $returnType    = 'object';

        protected $useTimestamps = true;

        protected $createdField  = 'create_date';
        protected $updatedField  = 'update_date';

        protected $allowedFields =
        [
            'id',
            'joiner_id',
            'hardware_id',
            'create_user',
            'update_user'
        ];
    }
?>
