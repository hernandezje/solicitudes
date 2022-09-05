@extends('layouts.app')

@section('template_title')
    Requerimiento
@endsection

@section('content')
<section class="content container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card"style="background:transparent;">
                <div class="card-header" >
                  <table class="table table-striped table-hover">
                      <thead class="thead">
                          <tr class="text-light" style="font-size:30px;">

                              <th>PENDIENTE</th>
                              <th>EN PROCESO</th>
                              <th>FINALIZADO</th>


                          </tr>
                      </thead>
                      <tbody>

                              <tr>
                                <td></td>
                                <td>
                                </td>
                                <td></td>
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
