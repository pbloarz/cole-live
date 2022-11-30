@extends('layouts.theme.apps')
@section('content')

<div>
    <div class="row sales layout-top-spacing">
        <div class="col-sm-12">
            <div class="widget widget-chart-one">
                @if (session('status'))
                <div class="alert alert-secondary alert-dismissible fade show" role="alert">
                    <strong>¡ Correcto , Accion realizada ! </strong> {{ session('status') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif
                <div class="row">
                    <div class="col-lg-8 col-md-8 col-sm-8">
                        <div class="input-group mb-4">
                            <h4 class="card-title">
                                <b>{{$componentName}} | {{$pageTitle}}</b>

                            </h4>

                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">

                        <a href="{{route('createUser')}}" class=" btn btn-warning">
                            </i> Agregar
                            <i class="fa-solid fa-rectangle-ad"></i>

                        </a>

                    </div>

                </div>

                <div class="widget-content">
                    <div class="table-responsive">
                        <table class="table mb-4 table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th class="table-th text-dark">NOMBRE</th>
                                    <th class="table-th text-dark text-center">EMAIL</th>
                                    <th class="table-th text-dark text-center">ROL</th>


                                </tr>
                            </thead>
                            <tbody>
                                @if (count($users) == 0)
                                <tr>
                                    <td colspan="7" class="text-center">
                                        <h6>No hay informacion Cargada.</h6>
                                    </td>
                                </tr>
                                @else
                                @foreach ($users as $user)
                                <tr>
                                    <td>
                                        <h6 class="text-uppercase">{{$user->name}}</h6>
                                    </td>
                                    <td class="text-center">
                                        <h6>{{$user->email}}</h6>
                                    </td>
                                    <td class="text-center">
                                        <h6>{{$user->role}}</h6>
                                    </td>
                                    <td class="text-center">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <a href="{{route('user.edit',$user)}}" class="btn btn-success" title="Edit">
                                                    <i class="fa-solid fa-pen-fancy"></i>
                                                </a>
                                            </div>


                                            <div class="col-md-6">
                                                <form class="form" action="{{route('user.destroy',$user)}}" method="delete" class="formEliminar" id="form">
                                                    @csrf
                                                    @method('delete')


                                                    <button type="submit" class="btn btn-danger btn-sm " title="DELETE">
                                                        <i class="fa-solid fa-trash-can"></i>
                                                    </button>

                                                </form>
                                            </div>

                                        </div>


                                    </td>
                                </tr>
                                @endforeach
                                @endif

                            </tbody>
                        </table>
                        {{$users->links()}}

                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
@endsection
<script type="text/javascript">
    window.addEventListener("submit", (event) => {
        event.preventDefault();

        swal.fire({
            title: '¡ Operración riesgosa !',
            text: 'Al realizar esta acción se perderan lo datos. ¿ Desea continuar ?',
            type: 'warning',
            showCancelButton: true,
            cancelButtonText: 'Cerrar',
            cancelButtonColor: '#FFF',
            confirmButtonColor: '#3B3F5C',
            confirmButtonText: 'Aceptar'

        }).then(function(result) {
            if (result.value) {
                $('.form').submit();
                swal.close();
            }
        })

    }, true);
</script>