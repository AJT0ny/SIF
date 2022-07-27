@extends('layouts.app')

@section('template_title')
    Create Producto Ingresado
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Crear Nuevo Ingreso</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('producto-ingresado.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('producto-ingresado.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
