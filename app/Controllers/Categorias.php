<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\CategoriasModel;
class Categorias extends Controller{
    protected $categoriaModel;

    public function __construct()
    {
        $this->categoriaModel = new CategoriasModel();
    }

    public function index($estado = 1)
    {
        $categorias = $this->categoriaModel->where('estado', $estado)->findAll();
        $datos['titulo'] = 'Categorías - TiendaPOS';
        $datos['titulo_card'] = 'Categorías';
        $datos['categorias'] = $categorias;
        echo view('template/header', $datos);
        echo view('categorias/categorias', $datos);
        echo view('template/footer', $datos);
    }

    public function eliminados($estado = 0)
    {
        $categorias = $this->categoriaModel->where('estado', $estado)->findAll();
        $datos['titulo'] = 'Categorías Eliminadas - TiendaPOS';
        $datos['titulo_card'] = 'Categorías Eliminadas';
        $datos['categorias'] = $categorias;
        echo view('template/header', $datos);
        echo view('categorias/eliminados', $datos);
        echo view('template/footer', $datos);
    }

    public function nuevo()
    {
        
        $datos['titulo'] = 'Nueva Categoría - TiendaPOS';
        $datos['titulo_card'] = 'Nueva Categoría';
        echo view('template/header', $datos);
        echo view('categorias/nuevo', $datos);
        echo view('template/footer', $datos);
    }

    public function insertar()
    {
        $categoria = $this->request->getPost();
        $this->categoriaModel->save([
            'nombre' => $categoria['nombre']
        ]);

        return redirect()->to(base_url().'/categorias');
    }

    public function editar($id = null)
    {
        $categoria = $this->categoriaModel->where('id', $id)->first();
        $datos['titulo'] = 'Editar Categoría - TiendaPOS';
        $datos['titulo_card'] = 'Editar Categoría';
        $datos['categoria'] = $categoria;
        echo view('template/header', $datos);
        echo view('categorias/editar', $datos);
        echo view('template/footer', $datos);
    }

    public function actualizar()
    {
        $categoria = $this->request->getPost();
        $this->categoriaModel->update(
            $categoria['id'],
            [
                'nombre' => $categoria['nombre']
            ]);

        return redirect()->to(base_url().'/categorias');
    }

    public function eliminar($id = null)
    {
        $this->categoriaModel->update($id, ['estado' => 0]);
        return redirect()->to(base_url().'/categorias');
    }

    public function reingresar($id = null)
    {
        $this->categoriaModel->update($id, ['estado' => 1]);
        return redirect()->to(base_url().'/categorias');
    }
}