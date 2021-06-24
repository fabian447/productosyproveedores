<?php

namespace App\Http\Controllers;

use App\Producto;
use App\Proveedor;
use Illuminate\Http\Request;

class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return IlluminateHttpResponse
     */
    public function index()
    {
        $productos = Producto::orderBy('id', 'DESC')->get();
        $proveedores = Proveedor::all();
        return view('admin.productos.index', compact('productos', 'proveedores') );
    }

    public function edit($id){
		$producto = Producto::find($id);
        $proveedores = Proveedor::all();

		return view('admin.productos.edit', compact('producto', 'proveedores'));
	}
   
    /**
     * Store a newly created resource in storage.
     *
     * @param  IlluminateHttpRequest  $request
     * @return IlluminateHttpResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'precio' => 'required',
            'cantidad' => 'required',
            'proveedor_id' => 'required',
        ]);

        Producto::create($request->all());

        return redirect()->back();
    }
    /**
     * Display the specified resource.
     *
     * @param  AppProducto  $producto
     * @return IlluminateHttpResponse
     */
    public function show(Producto $producto)
    {
        return $producto;
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  AppProducto  $producto
     * @return IlluminateHttpResponse
     */
    /**
     * Update the specified resource in storage.
     *
     * @param  IlluminateHttpRequest  $request
     * @param  AppProducto  $producto
     * @return IlluminateHttpResponse
     */
    public function update(Request $request, $id)
    {
         $request->validate([
             'nombre' => 'required',
            'precio' => 'required',
            'cantidad' => 'required',
            'proveedor_id' => 'required',

         ]);
        
        $producto = Producto::find($id);
        $producto->nombre = $request->nombre;
        $producto->precio = $request->precio;
        $producto->cantidad = $request->cantidad;
        $producto->proveedor_id = $request->proveedor_id;

        $producto->save();

        return redirect(route('productos.index'));

    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  AppProducto  $producto
     * @return IlluminateHttpResponse
     */
    public function destroy($id)
    {
        $producto = Producto::find($id);
        $producto->delete();

        return redirect()->back();
        
    }
}
