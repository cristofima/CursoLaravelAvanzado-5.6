@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Usuarios  
                    <a title="Nuevo Usuario" data-toggle="modal" data-target="#modalCreate" 
                        href="#" class="btn btn-primary"><i class="fa fa-plus-circle" aria-hidden="true"></i></a>
                </div>
                <div class="card-body">
                    @include('includes.messages')
                    @include('panel.usuarios.create')
                <div class="table-responsive">
                    {{$usuarios->links()}}
                    <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">Nombre</th>
                        <th scope="col">E-mail</th>
                        <th scope="col">Fecha Creación</th>
                        <th scope="col">Última Actualización</th>
                        <th scope="col">Rol</th>
                        <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($usuarios as $u)
                            <tr>
                                <th scope="row">{{$u->name}}</th>
                                <td>{{$u->email}}</td>
                                <td>{{$u->created_at}}</td>
                                <td>{{$u->updated_at}}</td>
                                <td>
                                    @foreach ($u->roles as $r)
                                        {{$r->display_name}}
                                    @endforeach
                                </td>
                                <td></td>
                            </tr>
                        @endforeach
                    </tbody>
                    </table>
                    {{$usuarios->links()}}
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@prepend('scripts')
<script type="text/javascript">
    $(document).ready(function () {
        // $('#modalDelete').on('show.bs.modal', function (event) {
        //     var button = $(event.relatedTarget);
        //     var action = button.data('action');
        //     var name = button.data('name');
        //     var modal = $(this);
        //     modal.find(".modal-content #txtEliminar").html("¿Está seguro de eliminar la película <b>" + name + "</b>?");
        //     modal.find(".modal-content form").attr('action', action);
        // });
    });
</script>
@endprepend