<div>
    <h4 class="card-title text-center">
        <b>{{$componentName}} | {{$pageTitle}}</b>
    </h4>
    <hr>
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="input-group mb-4">
                @include('common.searchBox')
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-3">
            <a href="javascript:void(0)" class=" btn btn-warning" data-toggle="modal" data-target="#themodalUsers">
                </i> Agregar
                <i class="fa-solid fa-rectangle-ad"></i>
            </a>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-3">
            <a href="{{url('products/excel')}}" class="btn btn-secondary" target="_blank" title="Exportar">
                <i class="fa-solid fa-cloud-arrow-down"></i>
            </a>
            <a href="javascript:void(0)" class=" btn btn-danger" data-toggle="modal" data-target="#themodal-import" title="Importar">
                <i class="fa-solid fa-cloud-arrow-up"></i>
            </a>
        </div>
    </div>
    <table class="table mb-4 table-bordered table-hover">
        <thead>
            <tr>
                <th class="table-th text-dark text-center">Nombre</th>
                <th width="13%" class="table-th text-dark text-center ">Correo electronico</th>
                <th width="13%" class="table-th text-dark text-center ">Rol</th>
            </tr>
        </thead>
        <tbody>
            @if (count($users) == 0)
            <tr>
                <td colspan="2" class="text-center">
                    <h6>No hay informacion Cargada.</h6>
                </td>
            </tr>
            @else
            @foreach ($users as $user )
            <tr>
                <td>
                    <h6>{{$user->name}}</h6>
                </td>
                <td>
                    <h6>{{$user->email}}</h6>
                </td>
                <td>
                    <h6>{{$user->role}}</h6>
                </td>
                <td class="">

                    <div class="row">
                        <div class="col-md-6">
                            <a href="javascript:void(0)" wire:click="Edit({{$user->id}})" class="btn btn-warning mtmobile  btn-sm" title="EDIT">
                                <i class="fa-solid fa-pen-fancy"></i>
                            </a>
                        </div>
                        <div class="col-md-6">
                            <a href="javascript:void(0)" onclick="Confirm('user->id}}') " class="btn btn-danger btn-sm" title="DELETE">
                                <i class="fa-solid fa-trash-can"></i>
                            </a>
                        </div>
                    </div>


                </td>
            </tr>
            @endforeach
            @endif

        </tbody>
    </table>
    {{$users->links()}}
@include('livewire.user.form')
</div>