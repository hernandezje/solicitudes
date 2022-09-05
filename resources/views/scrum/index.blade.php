@extends('layouts.app')

@section('template_title')
    Requerimiento
@endsection

@section('content')
<head>
      <link rel="stylesheet" href="./css/tabla.css">
</head>
<section class="content container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" >
                  <table class="table table-striped table-hover">
                      <thead class="thead">
                          <tr class="text-light">

                              <th>PENDIENTE</th>
                              <th>EN PROCESO</th>
                              <th>FINALIZADO</th>


                          </tr>
                      </thead>
                      <tbody>

                              <tr>

                                <td>

                                  @foreach ($pendiente as $requerimiento)
                                  <table class="nota" style="background-color: #F5ED44;"><br>
                                    <tr>
                                      <td> {{ $requerimiento->fec_creacion }} </td>
                                    </tr>
                                    <tr>
                                      <th><a href="{{ route('requerimiento.show1',$requerimiento->id) }}"> {{ $requerimiento->titulo }} </a>  </th>
                                    </tr>
                                    <tr>
                                      <td> {{ $requerimiento->observacion }} </td>
                                    </tr>

                                  </table>
                                  @endforeach

                                </td>
                                <td>

                                  @foreach ($encurso as $requerimiento)
                                  <table class="nota" style="background-color: #44C7F5;"><br>
                                    <tr>
                                      <td> {{ $requerimiento->fec_creacion }} </td>
                                    </tr>
                                    <tr>
                                      <th> <a href="{{ route('requerimiento.show1',$requerimiento->id) }}">{{ $requerimiento->titulo }} </th>
                                    </tr>
                                    <tr>
                                      <td> {{ $requerimiento->observacion }} </td>
                                    </tr>

                                  </table>
                                  @endforeach

                                </td>
                                <td>

                                  @foreach ($finalizado as $requerimiento)
                                  <table class="nota" style="background-color: #33C43B;"><br>
                                    <tr>
                                      <td> {{ $requerimiento->fec_creacion }} </td>
                                    </tr>
                                    <tr>
                                      <th><a href="{{ route('requerimiento.show1',$requerimiento->id) }}"> {{ $requerimiento->titulo }} </th>
                                    </tr>
                                    <tr>
                                      <td> {{ $requerimiento->observacion }} </td>
                                    </tr>

                                  </table>
                                  @endforeach

                                </td>

                              </tr>

                      </tbody>
                  </table>
                </div>
            </div>
        </div>
    </div>


</section>
    @include('layouts.scrum')
@endsection
