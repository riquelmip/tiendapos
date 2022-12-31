<?php 
namespace App\Models;

use CodeIgniter\Model;

class CajasModel extends Model{
    protected $table      = 'cajas';
    protected $primaryKey = 'id';

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['numero_caja', 'nombre', 'folio', 'estado'];

    protected $useTimestamps = true;
    protected $createdField = 'fecha_creacion';
    protected $updatedField = 'fecha_edicion';
    protected $deletedField = 'deleted_at';

    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
}