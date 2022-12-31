<?php 
namespace App\Models;

use CodeIgniter\Model;

class RolesModel extends Model{
    protected $table      = 'roles';
    protected $primaryKey = 'id';

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['nombre', 'estado'];

    protected $useTimestamps = true;
    protected $createdField = 'fecha_creacion';
    protected $updatedField = 'fecha_edicion';
    protected $deletedField = 'deleted_at';

    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
}