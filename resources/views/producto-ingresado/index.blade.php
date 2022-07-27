@extends('layouts.app')

@section('template_title')
    Producto Ingresado
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
        <div class="col-xl-12">
            <form action="{{route ('producto-ingresado.index')}}" method="get">
                <div class="form-row">
                    <div class="col-sm-4 my-1">
                        <input type="text" class="form-control" name="texto" value="{{$texto}}">
                    </div>
                    <div class="col-auto my-1">
                        <input type="submit" class="btn btn-primary" value="Buscar">
                    </div>
                </div>
            </form>
        </div>
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Ingresar Producto') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('producto-ingresado.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Ingresar Nuevo') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Producto</th>
										<th>Cantidad Ingresada</th>
										<th>Fecha Ingreso</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(count($productoIngresados)<=0)
                                        <tr>
                                            <td colspan="5">No hay resultados</td>
                                        </tr>    
                                    @else
                                    @foreach ($productoIngresados as $productoIngresado)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $productoIngresado->producto->nombre}}</td>
											<td>{{ $productoIngresado->cantidadIngresar }}</td>
											<td>{{ $productoIngresado->fechaIngreso }}</td>

                                            <td>
                                                <form action="{{ route('producto-ingresado.destroy',$productoIngresado->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('producto-ingresado.show',$productoIngresado->id) }}"><i class="fa fa-fw fa-eye"></i> Ver</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Eliminar</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $productoIngresados->links() !!}
            </div>
        </div>
    </div>
@endsection
