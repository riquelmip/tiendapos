<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\ConfiguracionModel;
class Configuracion extends Controller
{
    protected $configuracionModel;
    protected $reglas;

    public function __construct()
    {
        $this->configuracionModel = new ConfiguracionModel();
        helper(['form']);
        $this->reglas = [
                'tienda_nombre' => [
                    'rules' => 'required', 
                    'errors' =>[
                        'required' => 'El campo {field} es obligatorio.'
                    ]
                ], 
                'tienda_rfc' => [
                    'rules' => 'required', 
                    'errors' =>[
                        'required' => 'El campo {field} es obligatorio.'
                    ]
                ],
                'tienda_telefono' => [
                    'rules' => 'required', 
                    'errors' =>[
                        'required' => 'El campo {field} es obligatorio.'
                    ]
                ],
                'tienda_email' => [
                    'rules' => 'required', 
                    'errors' =>[
                        'required' => 'El campo {field} es obligatorio.'
                    ]
                ],
                'tienda_direccion' => [
                    'rules' => 'required', 
                    'errors' =>[
                        'required' => 'El campo {field} es obligatorio.'
                    ]
                ],
                'ticket_leyenda' => [
                    'rules' => 'required', 
                    'errors' =>[
                        'required' => 'El campo {field} es obligatorio.'
                    ]
                ],
            ];
    }

    public function index($valid = null)
    {
        $datos['titulo'] = 'Configuraciones - TiendaPOS';
        $datos['titulo_card'] = 'Configuraciones';
        $datos['nombre'] = $this->configuracionModel->where('nombre', 'tienda_nombre')->first()['valor'];
        $datos['rfc'] = $this->configuracionModel->where('nombre', 'tienda_rfc')->first()['valor'];
        $datos['telefono'] = $this->configuracionModel->where('nombre', 'tienda_telefono')->first()['valor'];
        $datos['correo'] = $this->configuracionModel->where('nombre', 'tienda_email')->first()['valor'];
        $datos['direccion'] = $this->configuracionModel->where('nombre', 'tienda_direccion')->first()['valor'];
        $datos['frase_ticket'] = $this->configuracionModel->where('nombre', 'ticket_leyenda')->first()['valor'];
        if($valid != null){
            $datos['validation'] = $this->validator;
        }
        echo view('template/header', $datos);
        echo view('configuracion/configuraciones', $datos);
        echo view('template/footer', $datos);
    }

    public function actualizar()
    {
        if(!empty($this->request->getPost()) && $this->validate($this->reglas)){
            $configuraciones = $this->request->getPost();
            $this->configuracionModel->whereIn('nombre', ['tienda_nombre'])->set(['valor' => $configuraciones['tienda_nombre']])->update();
            $this->configuracionModel->whereIn('nombre', ['tienda_rfc'])->set(['valor' => $configuraciones['tienda_rfc']])->update();
            $this->configuracionModel->whereIn('nombre', ['tienda_telefono'])->set(['valor' => $configuraciones['tienda_telefono']])->update();
            $this->configuracionModel->whereIn('nombre', ['tienda_email'])->set(['valor' => $configuraciones['tienda_email']])->update();
            $this->configuracionModel->whereIn('nombre', ['tienda_direccion'])->set(['valor' => $configuraciones['tienda_direccion']])->update();
            $this->configuracionModel->whereIn('nombre', ['ticket_leyenda'])->set(['valor' => $configuraciones['ticket_leyenda']])->update();
            return redirect()->to(base_url().'/configuracion');
        }else{
            return $this->index($this->validator);

        }
    }

  
}