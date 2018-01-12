@extends('Plantilla/plantilla')

@section('content')
    <div id="ribbon">
        <ol class="breadcrumb">
            <li>Inicio</li><li>Correspondencia Recibida</li>
        </ol>
    </div>
    <div class="container">
        <div class="row">
            <div class="table-responsive">
                <div class="panel panel-default" id="panel-profin">
                    <div class="panel-heading textoHeader">Correspondencia Recibida</div>
                    <div class="panel-body">
                        {{-- <h3>Existen {{ $users->total() }} Usuarios</h3> --}}
                        <table class="table table-striped">
                            <tr>
                                <th>Codigo</th>
                                <th>Tipo</th>
                                <th>Fecha</th>
                                <th>Remitente</th>
                                <th>Referencia</th>
                                <th>Estado</th>
                                <th colspan="2" class="text-center">Acciones</th>
                            </tr>
                            @foreach($correspondencia as $c)
                                <tr data-id="{{ $c->id }}">
                                    <td>{{ 'R-'.$c->codigo }}</td>
                                    <td>{{ $c->tipo }}</td>
                                    <td>{{ $c->created_at }}</td>
                                    <td>{{ $c->remitente }}</td>
                                    <td>{{ $c->referencia }}</td>
                                    <td>{{ $c->estado }}</td>
                                    <td>
                                        <form method="post" class="form-horizontal" role="form"  action="{{ url('user/modificarUsuario')  }}"  >
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            {{-- <input type="hidden" name="_idUser" value="{{ $user->id }}"> --}}
                                            <div class="">
                                                <button type="submit" class="btn btn-primary center-block">
                                                    Modificar
                                                </button>
                                            </div>
                                        </form>
                                    </td>
                                    <td>
                                        <a href="" class="btn-delete">Eliminar</a>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                        {{-- {!! $users->setPath('users'); !!} --}}
                    </div>
                </div>

            </div>
        </div>
    </div>
    <form id="form-delete" role="form" method="POST" action="{{ route('users.destroy', ':USER_ID') }}">

        <input name="_method" type="hidden"  value="DELETE">
        <input name="_token" type="hidden" value="{{ csrf_token() }}">
    </form>
@endsection
@section('addscripts')
    <script>
        $('.btn-delete').click(function()
        {
            event.preventDefault();
            var row = $(this).parents('tr');
            var id = row.data('id');
            var form = $('#form-delete');
            var url = form.attr('action').replace(':USER_ID', id);
            var data = form.serialize();
            row.fadeOut();
            $.post(url, data, function(result)
            {
                alert(result);
            }).fail(function()
            {
                alert('El Usuario No fue Eliminado');
                row.show();
            });
        });
    </script>
@endsection
