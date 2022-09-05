
<html lang="es">
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./css/report.css">
  </head>


  <body>
    <header class="cabecera">
      <table>
        <tr>
          <th><img src="./images/dep.jpeg">
          </th>
          <th></th>
          <th>Fecha:{{$hoy}}</th>
        </tr>
      </table>
    </header>

    <section>

          <h2>RETRASOS EFECTUADOS EN {{$anio_actual}}</h2>
          <table class="table table-striped table-hover">
            <div class="col-xs-12 text-center">
              <div>
              <h3>Solicitudes finalizados con retrasos</h3>
                <h4>(Solicitud Finalizados con Retraso / Solicitudes Total Finalizados) * 100= <br>
                  ({{$rantiguos}}/ {{$finalizado}}) * 100 =
                  <b><?php echo(($rantiguos / $finalizado)*100) ?>%</b> <br>
                  <b>Un total de {{$rantiguos}} solicitudes finalizadas con retrasos y
                    <?php echo($finalizado - $rantiguos)?> solicitudes finalizadas a tiempo en este {{$anio_actual}}</b>
                </h4>
                <br>

              <h3>Solicitudes aun no finalizadas con retrasos</h3>
                <h4>(Solicitud con Retraso / Solicitudes Pendientes y en Curso) * 100= <br>
                  [{{$rpendientes}}/ ({{$pendiente}}+{{$encurso}})] * 100 = 
                  <b><?php echo(($rpendientes / ($pendiente + $encurso))*100) ?>%</b><br>
                  <b>Un total de {{$rpendientes}} solicitudes aun no finalizadas con retrasos en este {{$anio_actual}}</b>

                </h4>
                <br>

              </div>
            </div>
          </table>

          <div class="card-body">
              <div class="table-responsive">
                  <div class="container">

                      <h2>Listado de solicitudes finalizados con retrasos</h2>
                  </div>
                      <table class="table table-striped table-hover" width ="130%" align = "center">

                          <thead class="thead">
                              <tr>
                                <th>Nro</th>
                                <th>Fecha de Alta</th>
                                <th>Fecha de Entrega</th>
                                <th>Fecha de Finalización</th>
                                <th>Titulo</th>
                                <th>Responsable</th>

                              </tr>
                          </thead>
                          <tbody>
                            <?php $i=1; ?>
                              @foreach ($lrantiguos as $requerimiento)
                                  <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{ $requerimiento->fec_creacion }}</td>
                                    <td>{{ $requerimiento->fec_entrega }}</td>
                                    <td>{{ $requerimiento->fec_final}}</td>
                                    <td>{{ $requerimiento->titulo }}</td>
                                    <td>{{ $requerimiento->empleado->name }}</td>

                                  </tr>
                                  @endforeach
                          </tbody>
                    </table>
              </div>
          </div>

          <div class="card-body">
              <div class="table-responsive">
                    <div class="container">
                      <h2>Listado de solicitudes finalizados sin retrasos</h2>
                    </div>
                    <table class="table table-striped table-hover" width ="130%" align = "center">

                            <thead class="thead">
                                <tr>
                                  <th>Nro</th>
                                  <th>Fecha de Alta</th>
                                  <th>Fecha de Entrega</th>
                                  <th>Fecha de Finalización</th>
                                  <th>Titulo</th>
                                  <th>Responsable</th>

                                </tr>
                            </thead>
                                <tbody>
                                  <?php $i=1; ?>
                                    @foreach ($lsinretrasos as $requerimiento)
                                        <tr>
                                          <td>{{$i++}}</td>
                                          <td>{{ $requerimiento->fec_creacion }}</td>
                                          <td>{{ $requerimiento->fec_entrega }}</td>
                                          <td>{{ $requerimiento->fec_final}}</td>
                                          <td>{{ $requerimiento->titulo }}</td>
                                          <td>{{ $requerimiento->empleado->name }}</td>


                                        </tr>
                                    @endforeach
                                </tbody>
                    </table>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <div class="container">
                        <h2>Listado de solicitudes aun no finalizadas con retrasos</h2>
                    </div>
                    <table class="table table-striped table-hover" width ="130%" align = "center">
                          <thead class="thead">
                                <tr>
                                    <th>Nro</th>
                                    <th>Fecha de Alta</th>
                                    <th>Fecha de Entrega</th>
                                    <th>Fecha de Finalización</th>
                                    <th>Titulo</th>
                                    <th>Responsable</th>

                                    </tr>
                          </thead>
                          <tbody>
                                  <?php $i=1; ?>
                                    @foreach ($lrpendientes as $requerimiento)
                                        <tr>
                                          <td>{{$i++}}</td>
                                          <td>{{ $requerimiento->fec_creacion }}</td>
                                          <td>{{ $requerimiento->fec_entrega }}</td>
                                          <td><i>pendiente</i></td>
                                          <td>{{ $requerimiento->titulo }}</td>
                                          <td>{{ $requerimiento->empleado->name }}</td>

                                        </tr>
                                    @endforeach
                          </tbody>
                   </table>
                </div>
            </div>

    </section>
  </body>

</html>
