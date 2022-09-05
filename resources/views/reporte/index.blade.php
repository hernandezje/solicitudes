@extends('layouts.app')

@section('template_title')
  Estadisticas
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
    <table class="">
        <thead class="thead">
            <tr>
              <td>
                  <h2>&nbsp;&nbsp;&nbsp;       </h2>
              </td>
                <td><div class="col-xs-12 text-center">
                  <h2>Total de Solicitudes</h2>
                </div>

                <div id="donut-chart"></div>

                  <h1>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h1>

                </div>
                <a class="btn btn-sm btn-primary left" href="{{ URL::route('print') }}" target="_blank"><i class="fa fa-fw fa-eye"></i> Generar Reporte</a>
                </div>

              </td>
                  <script>
                    var chart = bb.generate({
                      data: {
                        columns: [
                          ["Pendiente", {{$pendiente}}],
                          ["En Curso", {{$encurso}}],
                          ["Finalizado", {{$finalizado}}],
                        ],
                        type: "donut",
                        onclick: function (d, i) {
                          console.log("onclick", d, i);
                        },
                        onover: function (d, i) {
                          console.log("onover", d, i);
                        },
                        onout: function (d, i) {
                          console.log("onout", d, i);
                        },
                      },
                      donut: {
                        title: "",
                      },
                      bindto: "#donut-chart",
                    });
                  </script>
                  <td>
                      <h2>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h2>
                  </td>
                  <td>
                      <div class="container">
                        <h3></h3>
                      <div>

                      </div>
                      </div>
                  </td>
                  <td>
                    <div class="col-xs-12 text-center">
                      <h2>Retrasos efectuados en {{$anio_actual}}</h2>
                      <h3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h3>
                    <div>
                    <h3>Solicitudes finalizados con retrasos</h3>
                    <?php
                    $fret = (($rantiguos / $finalizado)*100)
                    ?>
                    <h1>(Solicitud Finalizados con Retraso / Solicitudes Total Finalizados) * 100= <br>
                      ({{$rantiguos}}/ {{$finalizado}}) * 100 =
                      <b><?php echo(number_format($fret,2)) ?>%</b> <br>
                      <b>Un total de {{$rantiguos}} solicitudes finalizadas con retrasos y <br>
                        <?php echo($finalizado - $rantiguos)?> solicitudes finalizadas a tiempo en este {{$anio_actual}}</b>
                    </h1>
                    <h3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h3>
                    <h3>Solicitudes aun no finalizadas con retrasos</h3>
                    <?php

                    $ret= (($rpendientes / ($pendiente + $encurso))*100)
                    ?>
                    <h1>(Solicitud con Retraso / Solicitudes Pendientes y en Curso) * 100= <br>
                      [{{$rpendientes}}/ ({{$pendiente}}+{{$encurso}})] * 100 =
                      <b><?php echo(number_format($ret,2))?>%<br>
                      <b>Un total de {{$rpendientes}} solicitudes aun no finalizadas con retrasos en este {{$anio_actual}}</b>

                    </h1>
                    <h3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h3>


                    </div>
                    <a class="btn btn-sm btn-primary left" href="{{ URL::route('print2') }}" target="_blank"><i class="fa fa-fw fa-eye"></i> Generar Reporte</a>
                    </div>


                  </td>



            </tr>
        </thead>
    </table>
  </div>
</div>
</div>
</div>
</section>
<style>

    h3 {
      text-align: left;
      font-family: "Verdana", bold;
        font-size: 25px;
        color: black;
      }
      h2 {
        text-align: left;
        font-family: "Verdana";
        color: green;
          font-size: 40px;
        }
        h1 {
          text-align: left;
          font-family: "Verdana";
          color: black;
            font-size: 15px;
          }
  </style>
@endsection
