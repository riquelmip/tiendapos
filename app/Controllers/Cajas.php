<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\CajasModel;
class Cajas extends Controller{
    protected $cajasModel;
    protected $reglas;

    public function __construct()
    {
        $this->cajasModel = new CajasModel();
        helper(['form']);
        $this->reglas = [
                'num_caja' => [
                    'rules' => 'required', 
                    'errors' =>[
                        'required' => 'El campo {field} es obligatorio.'
                    ]
                ], 
                'folio' => [
                    'rules' => 'required', 
                    'errors' =>[
                        'required' => 'El campo {field} es obligatorio.'
                    ]
                ],
                'nombre' => [
                    'rules' => 'required', 
                    'errors' =>[
                        'required' => 'El campo {field} es obligatorio.'
                    ]
                ],
            ];
    }

    public function index($estado = 1)
    {
        $cajas = $this->cajasModel->where('estado', $estado)->findAll();
        $datos['titulo'] = 'Cajas - TiendaPOS';
        $datos['titulo_card'] = 'Cajas';
        $datos['cajas'] = $cajas;
        echo view('template/header', $datos);
        echo view('cajas/cajas', $datos);
        echo view('template/footer', $datos);
    }

    public function eliminados($estado = 0)
    {
        $cajas = $this->cajasModel->where('estado', $estado)->findAll();
        $datos['titulo'] = 'Cajas Eliminadas - TiendaPOS';
        $datos['titulo_card'] = 'Cajas Eliminadas';
        $datos['cajas'] = $cajas;
        echo view('template/header', $datos);
        echo view('cajas/eliminados', $datos);
        echo view('template/footer', $datos);
    }

    public function nuevo()
    {
        
        $datos['titulo'] = 'Cajas - TiendaPOS';
        $datos['titulo_card'] = 'Nueva Caja';
        echo view('template/header', $datos);
        echo view('cajas/nuevo', $datos);
        echo view('template/footer', $datos);
    }

    public function insertar()
    {
        if(!empty($this->request->getPost()) && $this->validate($this->reglas)){
            $caja = $this->request->getPost();
            $this->cajasModel->save([
                'numero_caja' => $caja['num_caja'],
                'folio' => $caja['folio'],
                'nombre' => $caja['nombre']
            ]);
            return redirect()->to(base_url().'/cajas');
        }else{
            $datos['titulo'] = 'Cajas - TiendaPOS';
            $datos['titulo_card'] = 'Nueva Caja';
            $datos['validation'] = $this->validator;
            echo view('template/header', $datos);
            echo view('cajas/nuevo', $datos);
            echo view('template/footer', $datos);
        }
        
        
    }

    public function editar($id = null, $valid = null)
    {
        $caja = $this->cajasModel->where('id', $id)->first();
        $datos['titulo'] = 'Cajas - TiendaPOS';
        $datos['titulo_card'] = 'Editar Caja';
        $datos['caja'] = $caja;
        if($valid != null){
            $datos['validation'] = $this->validator;
        }
        echo view('template/header', $datos);
        echo view('cajas/editar', $datos);
        echo view('template/footer', $datos);
    }

    public function actualizar()
    {
        if(!empty($this->request->getPost()) && $this->validate($this->reglas)){
            $caja = $this->request->getPost();
            $this->cajasModel->update(
                $caja['id'],
                [
                    'numero_caja' => $caja['num_caja'],
                    'folio' => $caja['folio'],
                    'nombre' => $caja['nombre']
                ]);
            return redirect()->to(base_url().'/cajas');
        }else{
            return $this->editar($this->request->getPost('id'), $this->validator);

        }
    }

    public function eliminar($id = null)
    {
        $this->cajasModel->update($id, ['estado' => 0]);
        return redirect()->to(base_url().'/cajas');
    }

    public function reingresar($id = null)
    {
        $this->cajasModel->update($id, ['estado' => 1]);
        return redirect()->to(base_url().'/cajas');
    }
}