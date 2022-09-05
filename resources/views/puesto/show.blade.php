@extends('layouts.app')

@section('template_title')
    {{ $puesto->name ?? 'Show puesto' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show puesto</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('puesto.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">

                      <div class="form-group">
                          <strong>Usuario de nivel:</strong>
                          {{ $puesto->nivel }}
                      </div>
                        <div class="form-group">
                            <strong>Descripcion:</strong>
                            {{ $puesto->descripcion }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
