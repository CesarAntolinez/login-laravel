@extends('template.content')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Roles</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                            <li class="breadcrumb-item">Roles</li>
                            <li class="breadcrumb-item active">Editar Rol</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Editar Rol</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fas fa-minus"></i></button>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ url('/roles/' . $rol->id) }}" class="form" enctype="multipart/form-data" method="post">
                        {{ csrf_field() }}
                        {{ method_field('PATCH') }}
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" name="nombre" id="nombre" class="form-control" value="{{ $rol->nombre }}">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success float-right"><i class="fa fa-save"></i> Guardar</button>
                            <a href="{{ url('/roles') }}" class="btn btn-default float-left"><i class="fa fa-arrow-left"></i> Regresar</a>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection
