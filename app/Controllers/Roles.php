<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\RolesModel;
class Roles extends Controller{
    protected $rolesModel;
    protected $reglas;

    public function __construct()
    {
        $this->rolesModel = new RolesModel();
        helper(['form']);
        $this->reglas = [
                'nombre' => [
                    'rules' => 'required', 
                    'errors' =>[
                        'required' => 'El campo {field} es obligatorio.'
                    ]
                ]
            ];
    }

    public function index($estado = 1)
    {
        $roles = $this->rolesModel->where('estado', $estado)->findAll();
        $datos['titulo'] = 'Roles - TiendaPOS';
        $datos['titulo_card'] = 'Roles';
        $datos['roles'] = $roles;
        echo view('template/header', $datos);
        echo view('roles/roles', $datos);
        echo view('template/footer', $datos);
    }

    public function eliminados($estado = 0)
    {
        $roles = $this->rolesModel->where('estado', $estado)->findAll();
        $datos['titulo'] = 'Roles Eliminadas - TiendaPOS';
        $datos['titulo_card'] = 'Roles Eliminadas';
        $datos['roles'] = $roles;
        echo view('template/header', $datos);
        echo view('roles/eliminados', $datos);
        echo view('template/footer', $datos);
    }

    public function nuevo()
    {
        
        $datos['titulo'] = 'Roles - TiendaPOS';
        $datos['titulo_card'] = 'Nuevo Rol';
        echo view('template/header', $datos);
        echo view('roles/nuevo', $datos);
        echo view('template/footer', $datos);
    }

    public function insertar()
    {
        if(!empty($this->request->getPost()) && $this->validate($this->reglas)){
            $rol = $this->request->getPost();
            $this->rolesModel->save([
                'nombre' => $rol['nombre']
            ]);
            return redirect()->to(base_url().'/roles');
        }else{
            $datos['titulo'] = 'Roles - TiendaPOS';
            $datos['titulo_card'] = 'Nuevo Rol';
            $datos['validation'] = $this->validator;
            echo view('template/header', $datos);
            echo view('roles/nuevo', $datos);
            echo view('template/footer', $datos);
        }
        
        
    }

    public function editar($id = null, $valid = null)
    {
        $rol = $this->rolesModel->where('id', $id)->first();
        $datos['titulo'] = 'Roles - TiendaPOS';
        $datos['titulo_card'] = 'Editar Rol';
        $datos['rol'] = $rol;
        if($valid != null){
            $datos['validation'] = $this->validator;
        }
        echo view('template/header', $datos);
        echo view('roles/editar', $datos);
        echo view('template/footer', $datos);
    }

    public function actualizar()
    {
        if(!empty($this->request->getPost()) && $this->validate($this->reglas)){
            $rol = $this->request->getPost();
            $this->rolesModel->update(
                $rol['id'],
                [
                    'nombre' => $rol['nombre']
                ]);
            return redirect()->to(base_url().'/roles');
        }else{
            return $this->editar($this->request->getPost('id'), $this->validator);

        }
    }

    public function eliminar($id = null)
    {
        $this->rolesModel->update($id, ['estado' => 0]);
        return redirect()->to(base_url().'/roles');
    }

    public function reingresar($id = null)
    {
        $this->rolesModel->update($id, ['estado' => 1]);
        return redirect()->to(base_url().'/roles');
    }
}