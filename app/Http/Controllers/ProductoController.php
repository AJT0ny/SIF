<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Categoria;
use App\Models\Provedore;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * Class ProductoController
 * @package App\Http\Controllers
 */
class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $texto=trim($request->get('texto'));
        $productos = Producto::select('id', 'categoriaId', 'proveedorId', 'nombre', 'descripcion', 'precio', 'existencia', 'presentacion')
        ->where('nombre','LIKE','%'.$texto.'%')
        ->orWhere('categoriaId','LIKE','%'.$texto.'%')
        ->orWhere('proveedorId','LIKE','%'.$texto.'%')
        ->orWhere('presentacion','LIKE','%'.$texto.'%')
        ->orWhere('precio','LIKE','%'.$texto.'%')
        ->orderBy('nombre','asc')
        ->paginate();

        return view('producto.index', compact('productos','texto'))
            ->with('i', (request()->input('page', 1) - 1) * $productos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $producto = new Producto();
        $categorias= Categoria::pluck('Nombre','id');
        $provedores= Provedore::pluck('Nombres','id');
        return view('producto.create', compact('producto','categorias','provedores'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Producto::$rules);

        $producto = Producto::create($request->all());

        return redirect()->route('productos.index')
            ->with('success', 'Producto created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $producto = Producto::find($id);

        return view('producto.show', compact('producto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $producto = Producto::find($id);
        $categorias= Categoria::pluck('Nombre','id');
        $provedores= Provedore::pluck('Nombres','id');

        return view('producto.edit', compact('producto','categorias','provedores'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Producto $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Producto $producto)
    {
        request()->validate(Producto::$rules);

        $producto->update($request->all());

        return redirect()->route('productos.index')
            ->with('success', 'Producto updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $producto = Producto::find($id)->delete();

        return redirect()->route('productos.index')
            ->with('success', 'Producto deleted successfully');
    }
}
