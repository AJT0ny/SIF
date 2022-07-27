@extends('layouts.app')

@section('template_title')
    {{ $productoIngresado->name ?? 'Show Producto Ingresado' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Ver Producto Ingresado</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('producto-ingresados.index') }}"> Atras</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Productosid:</strong>
                            {{ $productoIngresado->productosId }}
                        </div>
                        <div class="form-group">
                            <strong>Cantidadingresar:</strong>
                            {{ $productoIngresado->cantidadIngresar }}
                        </div>
                        <div class="form-group">
                            <strong>Fechaingreso:</strong>
                            {{ $productoIngresado->fechaIngreso }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
