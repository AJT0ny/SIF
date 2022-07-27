@extends('layouts.app')

@section('template_title')
    Facturacion
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
        <div class="col-xl-12">
            <form action="{{route ('productos.index')}}" method="get">
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
                                {{ __('Facturacion') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('facturacion.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
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
                                        
										<th>Clienteid</th>
										<th>Productoid</th>
										<th>Cliente</th>
										<th>Direccion Cliente</th>
										<th>Producto</th>
										<th>Cantidad</th>
										<th>Precio</th>
										<th>Isv</th>
										<th>Subtotal</th>
										<th>Total</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(count($facturaciones)<=0)
                                        <tr>
                                            <td colspan="12">No hay resultados</td>
                                        </tr>    
                                    @else
                                    @foreach ($facturaciones as $facturacion)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $facturacion->clienteId }}</td>
											<td>{{ $facturacion->productoId }}</td>
											<td>{{ $facturacion->cliente }}</td>
											<td>{{ $facturacion->direccion_cliente }}</td>
											<td>{{ $facturacion->producto }}</td>
											<td>{{ $facturacion->cantidad }}</td>
											<td>{{ $facturacion->precio }}</td>
											<td>{{ $facturacion->ISV }}</td>
											<td>{{ $facturacion->subtotal }}</td>
											<td>{{ $facturacion->total }}</td>

                                            <td>
                                                <form action="{{ route('facturaciones.destroy',$facturacion->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('facturaciones.show',$facturacion->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('facturaciones.edit',$facturacion->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Delete</button>
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
                {!! $facturaciones->links() !!}
            </div>
        </div>
    </div>
@endsection
