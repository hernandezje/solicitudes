@extends('layouts.app')

@section('template_title')
    Update Productosw
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Update Productosw</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('productosw.update', $productosw->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('productosw.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
