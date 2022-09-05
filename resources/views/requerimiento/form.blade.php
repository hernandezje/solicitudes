
<div class="box box-info padding-1">
    <div class="box-body">

      <div class="form-group">
          {{ Form::label('fecha de Alta') }}
          {{ Form::date('fec_creacion', $requerimiento->fec_creacion, ['class' => 'form-control' . ($errors->has('fec_creacion') ? ' is-invalid' : ''), 'placeholder' => 'Fecha de Alta']) }}
          {!! $errors->first('fec_creacion', '<div class="invalid-feedback">:message</div>') !!}
      </div>
      <div class="form-group">
          {{ Form::label('fecha de Entrega') }}
          {{ Form::date('fec_entrega', $requerimiento->fec_entrega, ['class' => 'form-control' . ($errors->has('fec_entrega') ? ' is-invalid' : ''), 'placeholder' => 'Fecha de Entrega']) }}
          {!! $errors->first('fec_entrega', '<div class="invalid-feedback">:message</div>') !!}
      </div>
      <div class="form-group">
            {{ Form::label('titulo') }}
            {{ Form::text('titulo', $requerimiento->titulo, ['class' => 'form-control' . ($errors->has('titulo') ? ' is-invalid' : ''), 'placeholder' => 'Titulo']) }}
            {!! $errors->first('titulo', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('descripcion') }}
            {{ Form::text('descripcion', $requerimiento->descripcion, ['class' => 'form-control' . ($errors->has('descripcion') ? ' is-invalid' : ''), 'placeholder' => 'Descripcion']) }}
            {!! $errors->first('descripcion', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('observacion') }}
            {{ Form::text('observacion', $requerimiento->observacion, ['class' => 'form-control' . ($errors->has('observacion') ? ' is-invalid' : ''), 'placeholder' => 'Observacion']) }}
            {!! $errors->first('observacion', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('estado Scrum') }}
            {{ Form::select('estado_id', $estados, $requerimiento->estado_id, ['class' => 'form-control' . ($errors->has('estado_id') ? ' is-invalid' : ''), 'placeholder' => 'Estado Scrum']) }}
            {!! $errors->first('estado_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Responsable') }}
            {{ Form::select('empleados_id', $empleados, $requerimiento->empleados_id, ['class' => 'form-control' . ($errors->has('empleados_id') ? ' is-invalid' : ''), 'placeholder' => 'Responsable']) }}
            {!! $errors->first('empleados_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('fecha de Finalización') }}
            {{ Form::date('fec_final', $requerimiento->fec_final, ['class' => 'form-control' . ($errors->has('fec_final') ? ' is-invalid' : ''), 'placeholder' => 'Fecha de Cierre']) }}
            {!! $errors->first('fec_final', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <form method="POST" action="/guardar" accept-charset="UTF-8" enctype="multipart/form-data">

          <input type="hidden" name="_token" value="{{ csrf_token() }}">

          <div class="form-group">
            <label class="col-md-4 control-label">Solicitud</label>
            <div class="col-md-6">
              <input type="file" class="form-control" name="rq_pdf" >

            </div>
          </div>
        </form>
<br>
    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Guardar</button>
    </div>
</div>
