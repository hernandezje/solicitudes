@extends('layouts.app')

@section('template_title')
    Create Requerimiento
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Create Requerimiento</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('requerimiento.store',$requerimiento->id) }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('requerimiento.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
