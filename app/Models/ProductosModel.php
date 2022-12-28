<?php 
namespace App\Models;

use CodeIgniter\Model;

class ProductosModel extends Model{
    protected $table      = 'productos';
    protected $primaryKey = 'id';

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['codigo', 
                                'nombre', 
                                'precio_compra', 
                                'precio_venta', 
                                'existencias', 
                                'stock_minimo', 
                                'inventariable', 
                                'id_unidad', 
                                'id_categoria', 
                                'estado'];

    protected $useTimestamps = true;
    protected $createdField = 'fecha_creacion';
    protected $updatedField = 'fecha_edicion';
    protected $deletedField = 'deleted_at';

    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
}