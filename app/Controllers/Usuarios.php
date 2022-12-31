<?php 
namespace App\Controllers;

use App\Models\CajasModel;
use App\Models\RolesModel;
use CodeIgniter\Controller;
use App\Models\UsuariosModel;
class Usuarios extends Controller{
    protected $usuariosModel;
    protected $cajasModel;
    protected $rolesModel;
    protected $reglas;
    protected $reglas_editar;

    public function __construct()
    {
        $this->usuariosModel = new UsuariosModel();
        $this->cajasModel = new CajasModel();
        $this->rolesModel = new RolesModel();
        helper(['form']);
        $this->reglas = [
                'usuario' => [
                    'rules' => 'required|alpha_numeric_punct|is_unique[usuarios.usuario]', 
                    'errors' =>[
                        'required' => 'El campo {field} es obligatorio.',
                        'alpha_numeric_punct' => 'El campo {field} debe ser alfanumérico o poseer caracteres de puntuación: ~ (tilde),
                        ! (exclamación), # (número), $ (dólar),
                        % (porcentaje), & (ampersand), * (asterisco),
                        - (guión), _ (guión bajo), + (más),
                        = (igual), | (barra vertical), : (dos puntos),
                        . (punto).',
                        'is_unique' => 'El campo {field} debe ser único.'
                    ]
                ],
                'password' => [
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
                'id_caja' => [
                    'rules' => 'required', 
                    'errors' =>[
                        'required' => 'El campo {field} es obligatorio.'
                    ]
                ],
                'id_rol' => [
                    'rules' => 'required', 
                    'errors' =>[
                        'required' => 'El campo {field} es obligatorio.'
                    ]
                ],
            ];

        
    }

    public function index($estado = 1)
    {
        $usuarios = $this->usuariosModel->select('usuarios.id as id_usuario,
                                            usuarios.nombre as nombre_usuario,
                                            usuarios.usuario,
                                            usuarios.id_caja,
                                            usuarios.id_rol,
                                            usuarios.estado as estado_usuario,
                                            roles.nombre as nombre_rol,
                                            cajas.nombre as nombre_caja'
                                            )
                                            ->join('roles', 'roles.id = usuarios.id_rol')
                                            ->join('cajas', 'cajas.id = usuarios.id_caja')
                                            ->where('usuarios.estado', $estado)
                                            ->findAll();
                                               
        $datos['titulo'] = 'Usuarios - TiendaPOS';
        $datos['titulo_card'] = 'Usuarios';
        //print_r("<pre>");print_r($usuarios);print_r("</pre>");die();
        $datos['usuarios'] = $usuarios;
        echo view('template/header', $datos);
        echo view('usuarios/usuarios', $datos);
        echo view('template/footer', $datos);
    }

    public function eliminados($estado = 0)
    {
        $usuarios = $this->usuariosModel->select('usuarios.id as id_usuario,
                                            usuarios.nombre as nombre_usuario,
                                            usuarios.usuario,
                                            usuarios.id_caja,
                                            usuarios.id_rol,
                                            usuarios.estado as estado_usuario,
                                            roles.nombre as nombre_rol,
                                            cajas.nombre as nombre_caja'
                                            )
                                            ->join('roles', 'roles.id = usuarios.id_rol')
                                            ->join('cajas', 'cajas.id = usuarios.id_caja')
                                            ->where('usuarios.estado', $estado)
                                            ->findAll();
        $datos['titulo'] = 'Usuarios Eliminadas - TiendaPOS';
        $datos['titulo_card'] = 'Usuarios Eliminadas';
        $datos['usuarios'] = $usuarios;
        echo view('template/header', $datos);
        echo view('usuarios/eliminados', $datos);
        echo view('template/footer', $datos);
    }

    public function nuevo()
    {
        
        $datos['titulo'] = 'Usuarios - TiendaPOS';
        $datos['titulo_card'] = 'Nuevo Usuario';
        $cajas = $this->cajasModel->where('estado', 1)->findAll();
        $roles = $this->rolesModel->where('estado', 1)->findAll();
        $datos['cajas'] = $cajas;
        $datos['roles'] = $roles;
        echo view('template/header', $datos);
        echo view('usuarios/nuevo', $datos);
        echo view('template/footer', $datos);
    }

    public function insertar()
    {
        if(!empty($this->request->getPost()) && $this->validate($this->reglas)){
            $usuario = $this->request->getPost();
            $this->usuariosModel->save([
                'usuario' => $usuario['usuario'],
                'password' => $usuario['password'],
                'nombre' => $usuario['nombre'],
                'id_caja' => $usuario['id_caja'],
                'id_rol' => $usuario['id_rol'],
            ]);
            return redirect()->to(base_url().'/usuarios');
        }else{
            $datos['titulo'] = 'Usuarios - TiendaPOS';
            $datos['titulo_card'] = 'Nuevo Usuario';
            $datos['validation'] = $this->validator;
            $cajas = $this->cajasModel->where('estado', 1)->findAll();
            $roles = $this->rolesModel->where('estado', 1)->findAll();
            $datos['cajas'] = $cajas;
            $datos['roles'] = $roles;
            echo view('template/header', $datos);
            echo view('usuarios/nuevo', $datos);
            echo view('template/footer', $datos);
        }
        
        
    }

    public function editar($id = null, $valid = null)
    {
        $usuario = $this->usuariosModel->where('id', $id)->first();
        $datos['titulo'] = 'Usuarios - TiendaPOS';
        $datos['titulo_card'] = 'Editar Usuario';
        $datos['usuario'] = $usuario;
        $cajas = $this->cajasModel->where('estado', 1)->findAll();
        $roles = $this->rolesModel->where('estado', 1)->findAll();
        $datos['cajas'] = $cajas;
        $datos['roles'] = $roles;
        if($valid != null){
            $datos['validation'] = $this->validator;
        }
        echo view('template/header', $datos);
        echo view('usuarios/editar', $datos);
        echo view('template/footer', $datos);
    }

    public function actualizar()
    {
        $reglas_editar1 = [
            'usuario' => [
                'rules' => 'required|alpha_numeric_punct|is_unique[usuarios.usuario,usuarios.usuario,{'.$this->request->getPost('usuario').'}]', 
                'errors' =>[
                    'required' => 'El campo {field} es obligatorio.',
                    'alpha_numeric_punct' => 'El campo {field} debe ser alfanumérico o poseer caracteres de puntuación: ~ (tilde),
                    ! (exclamación), # (número), $ (dólar),
                    % (porcentaje), & (ampersand), * (asterisco),
                    - (guión), _ (guión bajo), + (más),
                    = (igual), | (barra vertical), : (dos puntos),
                    . (punto).',
                    'is_unique' => 'El campo {field} debe ser único.'
                ]
            ],
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
            'id_caja' => [
                'rules' => 'required', 
                'errors' =>[
                    'required' => 'El campo {field} es obligatorio.'
                ]
            ],
            'id_rol' => [
                'rules' => 'required', 
                'errors' =>[
                    'required' => 'El campo {field} es obligatorio.'
                ]
            ],
        ];


        $reglas_editar2 = [
            'usuario' => [
                'rules' => 'required|alpha_numeric_punct|is_unique[usuarios.usuario,usuarios.usuario,{'.$this->request->getPost('usuario').'}]', 
                'errors' =>[
                    'required' => 'El campo {field} es obligatorio.',
                    'alpha_numeric_punct' => 'El campo {field} debe ser alfanumérico o poseer caracteres de puntuación: ~ (tilde),
                    ! (exclamación), # (número), $ (dólar),
                    % (porcentaje), & (ampersand), * (asterisco),
                    - (guión), _ (guión bajo), + (más),
                    = (igual), | (barra vertical), : (dos puntos),
                    . (punto).',
                    'is_unique' => 'El campo {field} debe ser único.'
                ]
            ],
            'password' => [
                'rules' => 'alpha_numeric_punct', 
                'errors' =>[
                    'alpha_numeric_punct' => 'El campo {field} debe ser alfanumérico o poseer caracteres de puntuación: ~ (tilde),
                    ! (exclamación), # (número), $ (dólar),
                    % (porcentaje), & (ampersand), * (asterisco),
                    - (guión), _ (guión bajo), + (más),
                    = (igual), | (barra vertical), : (dos puntos),
                    . (punto).'
                ]
            ],
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
            'id_caja' => [
                'rules' => 'required', 
                'errors' =>[
                    'required' => 'El campo {field} es obligatorio.'
                ]
            ],
            'id_rol' => [
                'rules' => 'required', 
                'errors' =>[
                    'required' => 'El campo {field} es obligatorio.'
                ]
            ],
        ];

        
        
        $tipo_regla = $this->reglas;
        if(empty($this->request->getPost('password'))){
            $tipo_regla = $reglas_editar1;
        }else{
            $tipo_regla = $reglas_editar2;
        }
        if(!empty($this->request->getPost()) && $this->validate($tipo_regla)){
            $usuario = $this->request->getPost();
            $this->usuariosModel->update(
                $usuario['id'],
                [
                    'usuario' => $usuario['usuario'],
                    'password' => $usuario['password'],
                    'nombre' => $usuario['nombre'],
                    'id_caja' => $usuario['id_caja'],
                    'id_rol' => $usuario['id_rol'],
                ]);
            return redirect()->to(base_url().'/usuarios');
        }else{
            return $this->editar($this->request->getPost('id'), $this->validator);

        }
    }

    public function eliminar($id = null)
    {
        $this->usuariosModel->update($id, ['estado' => 0]);
        return redirect()->to(base_url().'/usuarios');
    }

    public function reingresar($id = null)
    {
        $this->usuariosModel->update($id, ['estado' => 1]);
        return redirect()->to(base_url().'/usuarios');
    }
}