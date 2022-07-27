@extends('layouts.app')

@section('template_title')
    {{ $provedore->name ?? 'Show Provedore' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Mostrar Proveedor</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('provedores.index') }}"> Atras</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombres:</strong>
                            {{ $provedore->Nombres }}
                        </div>
                        <div class="form-group">
                            <strong>Telefono:</strong>
                            {{ $provedore->Telefono }}
                        </div>
                        <div class="form-group">
                            <strong>Direccion:</strong>
                            {{ $provedore->Direccion }}
                        </div>
                        <div class="form-group">
                            <strong>Correo:</strong>
                            {{ $provedore->Correo }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
