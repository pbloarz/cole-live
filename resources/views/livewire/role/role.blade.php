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
            <a href="javascript:void(0)" class=" btn btn-warning" data-toggle="modal" data-target="#themodal">
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
                <th with="40" class="table-th text-dark text-center">ROL</th>
                <th with="40" class="table-th text-dark text-center ">GUARD_NAME</th>
                <th with="20" class="table-th text-dark text-center "></th>


            </tr>
        </thead>
        <tbody>
            @if (count($roles) == 0)
            <tr>
                <td colspan="2" class="text-center">
                    <h6>No hay informacion Cargada.</h6>
                </td>
            </tr>
            @else
            @foreach ($roles as $role )
            <tr>
                <td class="text-center">
                    <h6>{{$role->name}}</h6>
                </td>
                <td>
                    <h6>{{$role->guard_name}}</h6>
                </td>
                <td class="text-center">
                    <a href="javascript:void(0)" wire:click="Edit({{$role->id}})" class="btn btn-warning  btn-sm" title="EDIT">
                        <i class="fa-solid fa-pen-fancy"></i>
                    </a>
                    <a href="javascript:void(0)" onclick="Confirm('{{$role->id}}') " class="btn btn-danger btn-sm" title="DELETE">
                        <i class="fa-solid fa-trash-can"></i>
                    </a>
                </td>
            </tr>
            @endforeach
            @endif

        </tbody>
    </table>
    @include('livewire.role.form')
</div>