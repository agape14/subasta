@extends('adminlte::page')

@section('title', 'Inmuebles')
@section('plugins.Sweetalert2', true)
@section('plugins.Datatables', true)
@section('content_header')
    <h1></h1>
@stop

@section('content')

<div class="card">
        <div class="card-header">
        Listado de Inmueble
        </div>
        <div class="card-body">
            <a href="/inmueble/create" class="btn btn-primary mb-3"> <span class="btn-label"><i class="fas fa-plus mr-1"></i></span>Nuevo</a>
            <table id="tblInmueble" class="table table-info table-striped shadow-lg mt-4" style="width:100%">
                <thead class="bg-primary text-white">
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Urbanizacion</th>
                        <th scope="col">Mz</th>
                        <th scope="col">Lote</th>
                        <th scope="col">Area</th>
                        <th scope="col">Partida <br> Registral</th>
                        <th scope="col">Precio <br> Base</th>
                        <th scope="col">Garantia</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                   @foreach ($inmueble as $esp)
                    <tr>
                        <td>{{ $esp->id}}</td>
                        <td>{{ $esp->urbanizacion}}</td>
                        <td>{{ $esp->mz}}</td>
                        <td>{{ $esp->lote}}</td>
                        <td>{{ $esp->area}}</td>
                        <td>{{ $esp->partida_registral}}</td>
                        <td>{{ $esp->precio_base}}</td>
                        <td>{{ $esp->garantia}}</td>
                        <td>
                            <form action="{{ route('inmueble.destroy',$esp->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                                <a href="/inmueble/{{$esp->id}}/edit" class="btn btn-warning"><span class="btn-label"><i class="fas fa-edit mr-1"></i></span>Editar</a>
                                <button class="btn btn-danger"><span class="btn-label"><i class="fa fa-trash mr-1"></i></span>Eliminar</button>
                            </form>
                        </td>
                    </tr>
                   @endforeach
                </tbody>
                </table>
        </div>
        <div class="card-body">
                <button type="button" id="btnSuccess" class="btn btn-success toastrDefaultSuccess">
                  Launch Success Toast
                </button>
                <button type="button" class="btn btn-info toastrDefaultInfo">
                  Launch Info Toast
                </button>
                <button type="button" class="btn btn-danger toastrDefaultError">
                  Launch Error Toast
                </button>
                <button type="button" class="btn btn-warning toastrDefaultWarning">
                  Launch Warning Toast
                </button>
                <div class="text-muted mt-3">
                  For more examples look at <a href="https://codeseven.github.io/toastr/">https://codeseven.github.io/toastr/</a>
                </div>
              </div>
    </div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> 
   $(document).ready(function() {
        $('#btnOpenSaltB').click(function() {
            Swal.fire(
                'Good job!',
                'You clicked the button!',
                'success'
            );
        });

        var Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });

        $('#btnSuccess').click(function() {
            Toast.fire({
                icon: 'success',
                title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
            });
        });
    })
  </script>

    
@stop
