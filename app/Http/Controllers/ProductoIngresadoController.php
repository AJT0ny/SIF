<?php

namespace App\Http\Controllers;

use App\Models\ProductoIngresado;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * Class ProductoIngresadoController
 * @package App\Http\Controllers
 */
class ProductoIngresadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $texto=trim($request->get('texto'));
        $productoIngresados = ProductoIngresado::select('id', 'productosId', 'cantidadIngresar','fechaIngreso')
        ->where('productosId','LIKE','%'.$texto.'%')
        ->orWhere('id','LIKE','%'.$texto.'%')
        ->orWhere('fechaIngreso','LIKE','%'.$texto.'%')
        ->orderBy('productosId','asc')
        ->paginate();

        return view('producto-ingresado.index', compact('productoIngresados','texto'))
            ->with('i', (request()->input('page', 1) - 1) * $productoIngresados->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $productoIngresado = new ProductoIngresado();
        $productos= Producto::pluck('nombre','id');
        return view('producto-ingresado.create', compact('productoIngresado','productos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(ProductoIngresado::$rules);

        $inventarioViejo= Producto::select('existencia')
                                    ->where('id',$request->get('productosId'))
                                    ->pluck('existencia');
        $inventarioViejoArr= array_map('intval', json_decode($inventarioViejo, true));
        $inventario= implode('',$inventarioViejoArr);                            
        $inventario+=$request->get('cantidadIngresar');
        $productoSumarInventario = DB::table('productos')
                                    ->where('id',$request->get('productosId'))
                                    ->update(['existencia' => $inventario]);
        
        $productoIngresado = ProductoIngresado::create($request->all());
        

        return redirect()->route('producto-ingresado.index')
            ->with('success', 'Producto Ingresado creado Correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $productoIngresado = ProductoIngresado::find($id);

        return view('producto-ingresado.show', compact('productoIngresado'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $productoIngresado = ProductoIngresado::find($id);

        return view('producto-ingresado.edit', compact('productoIngresado'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  ProductoIngresado $productoIngresado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductoIngresado $productoIngresado)
    {
        request()->validate(ProductoIngresado::$rules);

        $productoIngresado->update($request->all());

        return redirect()->route('producto-ingresado.index')
            ->with('success', 'ProductoIngresado updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $productoIngresado = ProductoIngresado::find($id)->delete();

        return redirect()->route('producto-ingresado.index')
            ->with('success', 'ProductoIngresado deleted successfully');
    }
}
