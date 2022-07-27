<?php

namespace App\Http\Controllers;

use App\Models\Provedore;
use Illuminate\Http\Request;

/**
 * Class ProvedoreController
 * @package App\Http\Controllers
 */
class ProvedoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $texto=trim($request->get('texto'));
        $provedores = Provedore::select('id', 'Nombres', 'Telefono','Direccion','Correo')
        ->where('Nombres','LIKE','%'.$texto.'%')
        ->orWhere('Telefono','LIKE','%'.$texto.'%')
        ->orWhere('Direccion','LIKE','%'.$texto.'%')
        ->orWhere('Correo','LIKE','%'.$texto.'%')
        ->orderBy('Nombres','asc')
        ->paginate();


        return view('provedore.index', compact('provedores','texto'))
            ->with('i', (request()->input('page', 1) - 1) * $provedores->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $provedore = new Provedore();
        return view('provedore.create', compact('provedore'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Provedore::$rules);

        $provedore = Provedore::create($request->all());

        return redirect()->route('provedores.index')
            ->with('success', 'Provedore created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $provedore = Provedore::find($id);

        return view('provedore.show', compact('provedore'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $provedore = Provedore::find($id);

        return view('provedore.edit', compact('provedore'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Provedore $provedore
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Provedore $provedore)
    {
        request()->validate(Provedore::$rules);

        $provedore->update($request->all());

        return redirect()->route('provedores.index')
            ->with('success', 'Provedore updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $provedore = Provedore::find($id)->delete();

        return redirect()->route('provedores.index')
            ->with('success', 'Provedore deleted successfully');
    }
}
