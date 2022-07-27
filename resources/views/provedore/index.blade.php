@extends('layouts.app')

@section('template_title')
    Provedore
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
        <div class="col-xl-12">
            <form action="{{route ('provedores.index')}}" method="get">
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
                                {{ __('Proveedores') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('provedores.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Crear Nuevo') }}
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
                                        
										<th>Nombres</th>
										<th>Telefono</th>
										<th>Direccion</th>
										<th>Correo</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(count($provedores)<=0)
                                        <tr>
                                            <td colspan="5">No hay resultados</td>
                                        </tr>    
                                    @else
                                    @foreach ($provedores as $provedore)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $provedore->Nombres }}</td>
											<td>{{ $provedore->Telefono }}</td>
											<td>{{ $provedore->Direccion }}</td>
											<td>{{ $provedore->Correo }}</td>

                                            <td>
                                                <form action="{{ route('provedores.destroy',$provedore->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('provedores.show',$provedore->id) }}"><i class="fa fa-fw fa-eye"></i> Ver</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('provedores.edit',$provedore->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
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
                {!! $provedores->links() !!}
            </div>
        </div>
    </div>
@endsection
