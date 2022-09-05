@extends('layouts.app')

@section('template_title')
    Requerimiento
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Requerimiento') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('requerimiento.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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

                    <th>Fecha de Alta</th>
                    <th>Fecha de Entrega</th>
                    <th>Titulo</th>
										<th>Responsable</th>
										<th>Estado Scrum</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($requerimientos as $requerimiento)
                                        <tr>
                                            <td>{{ ++$i }}</td>

                      <td>{{ $requerimiento->fec_creacion }}</td>
                      <td>{{ $requerimiento->fec_entrega }}</td>
                      <td>{{ $requerimiento->titulo }}</td>
											<td>{{ $requerimiento->empleado->name }}</td>
											<td>{{ $requerimiento->estado->descripcion }}</td>

                                            <td>
                                                <form action="{{ route('requerimiento.destroy',$requerimiento->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('requerimiento.show',$requerimiento->id) }}"><i class="fa fa-fw fa-eye"></i> Ver</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('requerimiento.edit',$requerimiento->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
                                                    <a class="btn btn-secondary btn-sm"  href="{{ route('productosw.create',$requerimiento->id) }}"><i class="fa fa-fw fa-warning"></i> Respuesta</a>

                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Eliminar</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $requerimientos->links() !!}
            </div>
        </div>
    </div>
@endsection
