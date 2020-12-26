<?php

    namespace App\Models;

    use CodeIgniter\Model;

    class Leaver_Hardware_MTM_Model extends Model
    {
        protected $table         = 'leaver_hdw_mtm';
        protected $primaryKey    = 'id';

        protected $returnType    = 'object';

        protected $useTimestamps = true;

        protected $createdField  = 'create_date';
        protected $updatedField  = 'update_date';

        protected $allowedFields =
        [
            'id',
            'leaver_id',
            'hardware_id',
            'create_user',
            'update_user'
        ];
    }
?>
