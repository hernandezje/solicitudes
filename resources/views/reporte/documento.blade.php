

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
        <div class="card-body" >
          <h2>LISTADOS DE SOLICITUDES</h2>
          <table class="table table-striped table-hover" width ="90%" align = "center">

            <h4>Pendiente:  {{$cpendiente}} solicitudes</h4>
            <h4>En curso:   {{$cencurso}} solicitudes</h4>
            <h4>Finalizados:  {{$cfinalizado}} solicitudes</h4>
          </table>

        </div>
        <div class="card-body">
            <div class="table-responsive">
              <div class="">
                <h3>PENDIENTES</h3>
              </div>
                <table class="table table-striped table-hover" width ="89%" align = "center">

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
                        @foreach ($pendiente as $requerimiento)
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

        <div class="card-body">
            <div class="table-responsive">
                <div class="container">
                    <h3>EN CURSO</h3>
                </div>
                <table class="table table-striped table-hover" width ="90%" align = "center">

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
                          @foreach ($encurso as $requerimiento)
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
        <div class="card-body">
              <div class="table-responsive">
                  <div class="container">
                      <h3>FINALIZADOS</h3>
                  </div>
                  <table class="table table-striped table-hover" width ="90%" align = "center">

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
                              @foreach ($finalizado as $requerimiento)
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
      </section>

    </body>
</html>
