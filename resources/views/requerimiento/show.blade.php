@extends('layouts.app')

@section('template_title')
    {{ $requerimiento->name ?? 'Show Requerimiento' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Requerimiento</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('requerimiento.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">

                      <div class="form-group">
                          <strong>Área:</strong>
                          {{ $requerimiento->empleado->area->descripcion }}
                      </div>
                      <div class="form-group">
                          <strong>Responsable:</strong>
                          {{ $requerimiento->empleado->name }}
                      </div>
                      <div class="form-group">
                          <strong>puesto:</strong>
                          {{ $requerimiento->empleado->puesto->descripcion }}
                      </div>
                      <div class="form-group">
                          <strong>Fecha de Alta:</strong>
                          {{ $requerimiento->fec_creacion }}
                      </div>
                      <div class="form-group">
                          <strong>Fecha de Entrega:</strong>
                          {{ $requerimiento->fec_entrega }}
                      </div>
                      <div class="form-group">
                          <strong>Fecha de Finalización:</strong>
                          {{ $requerimiento->fec_final }}
                      </div>
                        <div class="form-group">
                            <strong>Título:</strong>
                            {{ $requerimiento->titulo }}
                        </div>
                        <div class="form-group">
                            <strong>Descripción:</strong>
                            {{ $requerimiento->descripcion }}
                        </div>
                        <div class="form-group">
                            <strong>Observación:</strong>
                            {{ $requerimiento->observacion }}
                        </div>
                        <div class="form-group">
                            <strong>Estado Scrum:</strong>
                            {{ $requerimiento->estado->descripcion }}
                        </div>
                        <div class="form-group">
                            <strong>Archivo:</strong>
                            <?php 
                        
                            $url = Storage::url($requerimiento->rq_pdf);
                            ?>
                            <a target="_blank" href="{{ url($url)}}">{{ $requerimiento->rq_pdf }}</a>

                        </div>

                    </div>
                </div>
            </div>
        </div>
        @foreach ($productosw as $productosw)
          @include('productosw.show')

        @endforeach

</section>
@endsection
