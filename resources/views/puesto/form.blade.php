<div class="box box-info padding-1">
    <div class="box-body">

      <div class="form-group">
          {{ Form::label('Nivel Jerarquico') }}
          {{ Form::select('nivel', [1, 2, 3], $puesto->nivel, ['class' => 'form-control' . ($errors->has('nivel') ? ' is-invalid' : ''), 'placeholder' => '']) }}
          {!! $errors->first('nivel', '<div class="invalid-feedback">:message</div>') !!}
      </div>
        <div class="form-group">
            {{ Form::label('descripcion') }}
            {{ Form::text('descripcion', $puesto->descripcion, ['class' => 'form-control' . ($errors->has('descripcion') ? ' is-invalid' : ''), 'placeholder' => 'Descripcion']) }}
            {!! $errors->first('descripcion', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Guardar</button>
    </div>
</div>
