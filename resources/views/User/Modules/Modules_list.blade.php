@extends('template.content')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Modulos</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                            <li class="breadcrumb-item active">Modulos</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Modulos</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fas fa-minus"></i></button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Ruta</th>
                                <th>Acción</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($modules as $item)
                                <tr>
                                    <td>{{ $item['id'] }}</td>
                                    <td>{{ $item['nombre'] }}</td>
                                    <td>{{ $item['ruta'] }}</td>
                                    <td>
                                        <button class="btn btn-danger eliminar" data-id="{{ $item['id'] }}"><i class="fa fa-trash"></i> Eliminar</button>
                                        <a href="{{ url('/modules/' . $item['id'] . '/edit') }}" class="btn btn-warning"><i class="fa fa-edit"></i> Editar</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer">
                    <a href="{{ url('/modules/create') }}" class="btn btn-success"><i class="fa fa-plus"></i> Crear</a>
                </div>
            </div>
        </section>
    </div>
@endsection
@section('script')
    <script>
        @if (session('message'))
        Swal.fire({
            type: 'success',
            title: '{{ session('message') }}',
            showConfirmButton: false,
            timer: 2000
        });
        @endif

        $('.eliminar').click(function (e) {
            var info = $(this).parents('tr');
            var data = $(this).data();
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false
            });

            swalWithBootstrapButtons.fire({
                title: 'Desea borrar?',
                text: "Este modulo",
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Aceptar',
                cancelButtonText: 'cancelar',
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        url: "{{ url('/modules') }}" + '/' + data['id'],
                        type: 'DELETE',
                        data: {
                            "_token": "{{ csrf_token() }}",
                        },
                        dataType : 'json',
                        error : function(xhr, status) {
                            alert('Disculpe, existió un problema');
                        },
                        success : function(xhr, status) {
                            info.remove();
                            swalWithBootstrapButtons.fire(
                                'Eliminado!',
                                'El modulo fue eliminado. ',
                                'success'
                            );
                        }
                    });
                }
            })
        });
    </script>
@endsection
