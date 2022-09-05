
<section>
  <div class="row">
      <div class="col-md-12">
          <div class="card">
              <div class="card-header">

                  <a class="btn btn-danger btn-sm"  href="{{ route('productosw.destroy',$productosw->id) }}" style="float:right"><i class="fa fa-fw fa-warning"></i> Eliminar</a>

                  <div class="float-left">
                      <span class="card-title">Show respuesta</span>
                  </div>

              </div>

              <div class="card-body">


                        <div class="form-group">
                            <strong>Título:</strong>
                              {{ $productosw->titulo }}
                        </div>
                        <div class="form-group">
                            <strong>Observacion:</strong>
                              {{ $productosw->observacion }}
                        </div>
                        <div class="form-group">
                            <strong>Archivo:</strong>
                            <?php $var = $productosw->ps_pdf;
                              $var2 = 'storage/';
                              $var3 = $var2.$var;
                            ?>
                            <a target="_blank" href="{{asset($var3)}}">{{ $productosw->ps_pdf }}</a>

                        </div>




              </div>
          </div>
      </div>
  </div>
</section>
