<?php 
namespace App\Controllers;

use App\Models\CategoriasModel;
use CodeIgniter\Controller;
use App\Models\ProductosModel;
use App\Models\UnidadesModel;

class Productos extends Controller{

    protected $productoModel;
    protected $categoriaModel;
    protected $unidadModel;

    public function __construct()
    {
        $this->productoModel = new ProductosModel();
        $this->categoriaModel = new CategoriasModel();
        $this->unidadModel = new UnidadesModel();
    }

    public function index($estado = 1)
    {
        $productos = $this->productoModel->where('estado', $estado)->findAll();
        $datos['titulo'] = 'Productos - TiendaPOS';
        $datos['titulo_card'] = 'Productos';
        $datos['productos'] = $productos;
        echo view('template/header', $datos);
        echo view('productos/productos', $datos);
        echo view('template/footer', $datos);
    }

    public function eliminados($estado = 0)
    {
        $productos = $this->productoModel->where('estado', $estado)->findAll();
        $datos['titulo'] = 'Productos Eliminados - TiendaPOS';
        $datos['titulo_card'] = 'Productos Eliminados';
        $datos['productos'] = $productos;
        echo view('template/header', $datos);
        echo view('productos/eliminados', $datos);
        echo view('template/footer', $datos);
    }

    public function nuevo()
    {
        $categorias = $this->categoriaModel->where('estado', 1)->findAll();
        $unidades = $this->unidadModel->where('estado', 1)->findAll();
        $datos['titulo'] = 'Nuevo Producto - TiendaPOS';
        $datos['titulo_card'] = 'Nuevo Producto';
        $datos['categorias'] = $categorias;
        $datos['unidades'] = $unidades;
        echo view('template/header', $datos);
        echo view('productos/nuevo', $datos);
        echo view('template/footer', $datos);
    }

    public function insertar()
    {
        if(!empty($this->request->getPost())){
            $producto = $this->request->getPost();
            $this->productoModel->save([
                'codigo' => $producto['codigo'],
                'nombre' => $producto['nombre'],
                'precio_venta' => $producto['precio_venta'],
                'precio_compra' => $producto['precio_compra'],
                'stock_minimo' => $producto['stock_minimo'],
                'inventariable' => $producto['inventariable'],
                'id_unidad' => $producto['id_unidad'],
                'id_categoria' => $producto['id_categoria']
            ]);
            return redirect()->to(base_url().'/productos');
        }else{
            $datos['titulo'] = 'Unidades - TiendaPOS';
            $datos['titulo_card'] = 'Nueva Unidad';
            $datos['validation'] = $this->validator;
            echo view('template/header', $datos);
            echo view('productos/nuevo', $datos);
            echo view('template/footer', $datos);
        }
    }

    public function editar($id = null)
    {
        $producto = $this->productoModel->where('id', $id)->first();
        $categorias = $this->categoriaModel->where('estado', 1)->findAll();
        $unidades = $this->unidadModel->where('estado', 1)->findAll();
        $datos['titulo'] = 'Editar Producto - TiendaPOS';
        $datos['titulo_card'] = 'Editar Producto';
        $datos['producto'] = $producto;
        $datos['categorias'] = $categorias;
        $datos['unidades'] = $unidades;
        echo view('template/header', $datos);
        echo view('productos/editar', $datos);
        echo view('template/footer', $datos);
    }

    public function actualizar()
    {
        if(!empty($this->request->getPost())){
            $producto = $this->request->getPost();
            $this->productoModel->update(
                                        $producto['id'],
                                        [
                                            'codigo' => $producto['codigo'],
                                            'nombre' => $producto['nombre'],
                                            'precio_venta' => $producto['precio_venta'],
                                            'precio_compra' => $producto['precio_compra'],
                                            'stock_minimo' => $producto['stock_minimo'],
                                            'inventariable' => $producto['inventariable'],
                                            'id_unidad' => $producto['id_unidad'],
                                            'id_categoria' => $producto['id_categoria']
                                        ]);
            return redirect()->to(base_url().'/productos');
        }

        
    }

    public function eliminar($id = null)
    {
        $this->productoModel->update($id, ['estado' => 0]);
        return redirect()->to(base_url().'/productos');
    }

    public function reingresar($id = null)
    {
        $this->productoModel->update($id, ['estado' => 1]);
        return redirect()->to(base_url().'/productos');
    }
}