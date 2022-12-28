<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UnidadesModel;
class Unidades extends Controller
{
    protected $unidadModel;
    protected $reglas;

    public function __construct()
    {
        $this->unidadModel = new UnidadesModel();
        helper(['form']);
        $this->reglas = [
                'nombre' => [
                    'rules' => 'required', 
                    'errors' =>[
                        'required' => 'El campo {field} es obligatorio.'
                    ]
                ], 
                'nombre_corto' => [
                    'rules' => 'required', 
                    'errors' =>[
                        'required' => 'El campo {field} es obligatorio.'
                    ]
                ]
            ];
    }

    public function index($estado = 1)
    {
        $unidades = $this->unidadModel->where('estado', $estado)->findAll();
        $datos['titulo'] = 'Unidades - TiendaPOS';
        $datos['titulo_card'] = 'Unidades';
        $datos['unidades'] = $unidades;
        echo view('template/header', $datos);
        echo view('unidades/unidades', $datos);
        echo view('template/footer', $datos);
    }

    public function eliminados($estado = 0)
    {
        $unidades = $this->unidadModel->where('estado', $estado)->findAll();
        $datos['titulo'] = 'Unidades Eliminadas - TiendaPOS';
        $datos['titulo_card'] = 'Unidades Eliminadas';
        $datos['unidades'] = $unidades;
        echo view('template/header', $datos);
        echo view('unidades/eliminados', $datos);
        echo view('template/footer', $datos);
    }

    public function nuevo()
    {
        
        $datos['titulo'] = 'Unidades - TiendaPOS';
        $datos['titulo_card'] = 'Nueva Unidad';
        echo view('template/header', $datos);
        echo view('unidades/nuevo', $datos);
        echo view('template/footer', $datos);
    }

    public function insertar()
    {
        if(!empty($this->request->getPost()) && $this->validate($this->reglas)){
            $unidad = $this->request->getPost();
            $this->unidadModel->save([
                'nombre' => $unidad['nombre'],
                'nombre_corto' => $unidad['nombre_corto']
            ]);
            return redirect()->to(base_url().'/unidades');
        }else{
            $datos['titulo'] = 'Unidades - TiendaPOS';
            $datos['titulo_card'] = 'Nueva Unidad';
            $datos['validation'] = $this->validator;
            echo view('template/header', $datos);
            echo view('unidades/nuevo', $datos);
            echo view('template/footer', $datos);
        }
        
        
    }

    public function editar($id = null, $valid = null)
    {
        $unidad = $this->unidadModel->where('id', $id)->first();
        $datos['titulo'] = 'Unidades - TiendaPOS';
        $datos['titulo_card'] = 'Editar Unidad';
        $datos['unidad'] = $unidad;
        if($valid != null){
            $datos['validation'] = $this->validator;
        }
        echo view('template/header', $datos);
        echo view('unidades/editar', $datos);
        echo view('template/footer', $datos);
    }

    public function actualizar()
    {
        if(!empty($this->request->getPost()) && $this->validate($this->reglas)){
            $unidad = $this->request->getPost();
            $this->unidadModel->update(
                $unidad['id'],
                [
                    'nombre' => $unidad['nombre'],
                    'nombre_corto' => $unidad['nombre_corto']
                ]);
            return redirect()->to(base_url().'/unidades');
        }else{
            return $this->editar($this->request->getPost('id'), $this->validator);

        }
    }

    public function eliminar($id = null)
    {
        $this->unidadModel->update($id, ['estado' => 0]);
        return redirect()->to(base_url().'/unidades');
    }

    public function reingresar($id = null)
    {
        $this->unidadModel->update($id, ['estado' => 1]);
        return redirect()->to(base_url().'/unidades');
    }
}