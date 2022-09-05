<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            {{ Form::label('titulo') }}
            {{ Form::text('titulo', $productosws->titulo, ['class' => 'form-control' . ($errors->has('titulo') ? ' is-invalid' : ''), 'placeholder' => 'Titulo']) }}
            {!! $errors->first('titulo', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('observacion') }}
            {{ Form::text('observacion', $productosws->observacion, ['class' => 'form-control' . ($errors->has('observacion') ? ' is-invalid' : ''), 'placeholder' => 'Observacion']) }}
            {!! $errors->first('observacion', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group" style="display:none">
            <?php $productosws->requerimientos_id = $requerimientos->id ?>
            {{ Form::label('requerimiento') }}
            {{ Form::text('requerimientos_id', $productosws->requerimientos_id, ['class' => 'form-control' . ($errors->has('requerimientos_id') ? ' is-invalid' : ''), 'placeholder' => 'requerimientos_id']) }}
            {!! $errors->first('requerimientos_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <form method="POST" action="/guardar" accept-charset="UTF-8" enctype="multipart/form-data">

          <input type="hidden" name="_token" value="{{ csrf_token() }}">

          <div class="form-group">
            <label class="col-md-4 control-label">Archivo:</label>
            <div class="col-md-6">
              <input type="file" class="form-control" name="ps_pdf" >

            </div>
          </div>
        </form>
<br>
    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Guardar</button>
    </div>
</div>
