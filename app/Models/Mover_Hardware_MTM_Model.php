<?php

    namespace App\Models;

    use CodeIgniter\Model;

    class Mover_Hardware_MTM_Model extends Model
    {
        protected $table         = 'mover_hdw_mtm';
        protected $primaryKey    = 'id';

        protected $returnType    = 'object';

        protected $useTimestamps = true;

        protected $createdField  = 'create_date';
        protected $updatedField  = 'update_date';

        protected $allowedFields =
        [
            'id',
            'mover_id',
            'hardware_id'
        ];
    }
?>
