@extends('layouts.app')

@section('template_title')
    {{ $facturacion->name ?? 'Show Facturacion' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Facturacion</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('facturacions.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Clienteid:</strong>
                            {{ $facturacion->clienteId }}
                        </div>
                        <div class="form-group">
                            <strong>Productoid:</strong>
                            {{ $facturacion->productoId }}
                        </div>
                        <div class="form-group">
                            <strong>Cliente:</strong>
                            {{ $facturacion->cliente }}
                        </div>
                        <div class="form-group">
                            <strong>Direccion Cliente:</strong>
                            {{ $facturacion->direccion_cliente }}
                        </div>
                        <div class="form-group">
                            <strong>Producto:</strong>
                            {{ $facturacion->producto }}
                        </div>
                        <div class="form-group">
                            <strong>Cantidad:</strong>
                            {{ $facturacion->cantidad }}
                        </div>
                        <div class="form-group">
                            <strong>Precio:</strong>
                            {{ $facturacion->precio }}
                        </div>
                        <div class="form-group">
                            <strong>Isv:</strong>
                            {{ $facturacion->ISV }}
                        </div>
                        <div class="form-group">
                            <strong>Subtotal:</strong>
                            {{ $facturacion->subtotal }}
                        </div>
                        <div class="form-group">
                            <strong>Total:</strong>
                            {{ $facturacion->total }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
