<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Sucursal;

class ProductosController extends Controller
{
    public function index(Request $request) {
      $codigo = $request->query('codigo');
      if($codigo){
        //dd($request); 
        $productos = Producto::where('producto_codigo', 'LIKE', '%'.$codigo.'%')->get();
      }else{
        $productos = Producto::all();     
      }

      $sucursales = Sucursal::all();
      return view('productos.index', ['productos' => $productos, 'sucursales' => $sucursales]);
    }

    public function crear(){
      $sucursales = Sucursal::all();
      return view('productos.crear', ['sucursales' => $sucursales]);
    }

    public function guardar(Request $request){
      $data = $request->validate([
        'producto_codigo' => 'required',
        'producto_nombre' => 'required',
        'producto_categoria' => 'required',
        'producto_cantidad' => 'required' ,
        'producto_precio' => 'required',
        'descripcion' => 'required',
        'sucursal_id' => 'required',
      ]);

      $newProduct = Producto::create($data);
      
      return redirect(route('producto.index'))->with('success', 'Producto 
      creado correctamente');
    }

    public function editar(Producto $producto){
      $sucursales = Sucursal::all();
      return view('productos.editar', ['producto' => $producto, 'sucursales' => $sucursales]);
    }

    public function actualizar(Producto $producto, Request $request){
      $data = $request->validate([
        'producto_codigo' => 'required',
        'producto_nombre' => 'required',
        'producto_categoria' => 'required',
        'producto_cantidad' => 'required' ,
        'producto_precio' => 'required',
        'descripcion' => 'required',
        'sucursal_id' => 'required',
      ]);

      $producto->update($data);
      return redirect(route('producto.index'))->with('success', 'Producto actualizado correctamente');
    }

    public function eliminar(Producto $producto){
      $producto->delete();
      return redirect(route('producto.index'))->with('success', 'Producto Eliminado Correctamente');
    }
}
