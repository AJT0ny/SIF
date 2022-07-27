<?php

namespace App\Http\Controllers;

use App\Models\Facturacion;
use App\Models\Cliente;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * Class FacturacionController
 * @package App\Http\Controllers
 */
class FacturacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $texto=trim($request->get('texto'));
        $facturaciones = Facturacion::select('clienteId', 'productoId', 'cliente', 'direccion_cliente', 'producto', 'cantidad', 'precio', 'ISV', 'subtotal', 'total')
        ->where('cliente', 'LIKE', '%'.$texto.'%')
        ->orWhere('producto', 'LIKE','%'.$texto.'%')
        ->orWhere('total', 'LIKE','%'.$texto.'%')
        ->orderBy('cliente','asc')
        ->paginate();

        return view('facturacion.index', compact('facturaciones','texto'))
            ->with('i', (request()->input('page', 1) - 1) * $facturaciones->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $facturacion = new Facturacion();
        $clientes= Cliente::pluck('Nombres','Direccion','id');
        $productos= Producto::pluck('nombre','precio','id');
        return view('facturacion.create', compact('facturacion', 'clientes','productos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Facturacion::$rules);

        $facturacion = Facturacion::create($request->all());

        return redirect()->route('facturacion.index')
            ->with('success', 'Facturacion ejecuatada Correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $facturacion = Facturacion::find($id);

        return view('facturacion.show', compact('facturacion'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $facturacion = Facturacion::find($id);

        return view('facturacion.edit', compact('facturacion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Facturacion $facturacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Facturacion $facturacion)
    {
        request()->validate(Facturacion::$rules);

        $facturacion->update($request->all());

        return redirect()->route('facturacion.index')
            ->with('success', 'Facturacion Actualizada Correctamente');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $facturacion = Facturacion::find($id)->delete();

        return redirect()->route('facturacion.index')
            ->with('success', 'Facturacion deleted successfully');
    }
}
