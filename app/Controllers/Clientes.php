<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\ClientesModel;
class Clientes extends Controller{
    protected $clienteModel;
    protected $reglas;

    public function __construct()
    {
        $this->clienteModel = new ClientesModel();
        helper(['form']);
        $this->reglas = [ 
                'nombre' => [
                    'rules' => 'required|alpha_numeric_punct', 
                    'errors' =>[
                        'required' => 'El campo {field} es obligatorio.',
                        'alpha_numeric_punct' => 'El campo {field} debe ser alfanumérico o poseer caracteres de puntuación: ~ (tilde),
                        ! (exclamación), # (número), $ (dólar),
                        % (porcentaje), & (ampersand), * (asterisco),
                        - (guión), _ (guión bajo), + (más),
                        = (igual), | (barra vertical), : (dos puntos),
                        . (punto).'
                    ]
                ],
                'direccion' => [
                    'rules' => 'required|alpha_numeric_punct', 
                    'errors' =>[
                        'required' => 'El campo {field} es obligatorio.',
                        'alpha_numeric_punct' => 'El campo {field} debe ser alfanumérico o poseer caracteres de puntuación: ~ (tilde),
                        ! (exclamación), # (número), $ (dólar),
                        % (porcentaje), & (ampersand), * (asterisco),
                        - (guión), _ (guión bajo), + (más),
                        = (igual), | (barra vertical), : (dos puntos),
                        . (punto).'
                    ]
                ],
                'telefono' => [
                    'rules' => 'required|numeric|max_length[8]|min_length[8]', 
                    'errors' =>[
                        'required' => 'El campo {field} es obligatorio.',
                        'numeric' => 'El campo {field} debe ser numérico.',
                        'max_length' => 'El campo {field} debe tener 8 números.',
                        'min_length' => 'El campo {field} debe tener 8 números.'
                    ]
                ],
                'correo' => [
                    'rules' => 'required|valid_emails', 
                    'errors' =>[
                        'required' => 'El campo {field} es obligatorio.',
                        'valid_emails' => 'El campo {field} debe ser un correo.'
                    ]
                ]


            ];
    }

    public function index($estado = 1)
    {
        $clientes = $this->clienteModel->where('estado', $estado)->findAll();
        $datos['titulo'] = 'Clientes - TiendaPOS';
        $datos['titulo_card'] = 'Clientes';
        $datos['clientes'] = $clientes;
        echo view('template/header', $datos);
        echo view('clientes/clientes', $datos);
        echo view('template/footer', $datos);
    }

    public function eliminados($estado = 0)
    {
        $clientes = $this->clienteModel->where('estado', $estado)->findAll();
        $datos['titulo'] = 'Clientes Eliminados - TiendaPOS';
        $datos['titulo_card'] = 'Clientes Eliminados';
        $datos['clientes'] = $clientes;
        echo view('template/header', $datos);
        echo view('clientes/eliminados', $datos);
        echo view('template/footer', $datos);
    }

    public function nuevo()
    {
        $datos['titulo'] = 'Nuevo Cliente - TiendaPOS';
        $datos['titulo_card'] = 'Nuevo Cliente';
        echo view('template/header', $datos);
        echo view('clientes/nuevo', $datos);
        echo view('template/footer', $datos);
    }

    public function insertar()
    {
        if(!empty($this->request->getPost()) && $this->validate($this->reglas)){
            $cliente = $this->request->getPost();
            $this->clienteModel->save([
                'nombre' => $cliente['nombre'],
                'direccion' => $cliente['direccion'],
                'telefono' => $cliente['telefono'],
                'correo' => $cliente['correo']
            ]);
            return redirect()->to(base_url().'/clientes');
        }else{
            $datos['validation'] = $this->validator;
            $datos['titulo'] = 'Nuevo Cliente - TiendaPOS';
            $datos['titulo_card'] = 'Nuevo Cliente';
            echo view('template/header', $datos);
            echo view('clientes/nuevo', $datos);
            echo view('template/footer', $datos);
        }
    }

    public function editar($id = null, $valid = null)
    {
        $cliente = $this->clienteModel->where('id', $id)->first();
        $datos['titulo'] = 'Editar Cliente - TiendaPOS';
        $datos['titulo_card'] = 'Editar Cliente';
        $datos['cliente'] = $cliente;
        if($valid != null){
            $datos['validation'] = $this->validator;
        }
        echo view('template/header', $datos);
        echo view('clientes/editar', $datos);
        echo view('template/footer', $datos);
    }

    public function actualizar()
    {
        if(!empty($this->request->getPost()) && $this->validate($this->reglas)){
            $cliente = $this->request->getPost();
            $this->clienteModel->update(
                                        $cliente['id'],
                                        [
                                            'nombre' => $cliente['nombre'],
                                            'direccion' => $cliente['direccion'],
                                            'telefono' => $cliente['telefono'],
                                            'correo' => $cliente['correo']
                                        ]);
            return redirect()->to(base_url().'/clientes');
        }else{
            return $this->editar($this->request->getPost('id'), $this->validator);

        }

        
    }

    public function eliminar($id = null)
    {
        $this->clienteModel->update($id, ['estado' => 0]);
        return redirect()->to(base_url().'/clientes');
    }

    public function reingresar($id = null)
    {
        $this->clienteModel->update($id, ['estado' => 1]);
        return redirect()->to(base_url().'/clientes');
    }
}