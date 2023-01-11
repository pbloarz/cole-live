<div>
<div>
    <div>
        <div class="row sales layout-top-spacing">
            <div class="col-sm-12">
                <div class="widget widget-chart-one">
                    <div class="widget-heading">
                        <h4 class="card-title">
                            <b>{{$componentName}} | {{$pageTitle}}</b>
                        </h4>

                    </div>
                    <div class="row">
                        <div class="col-lg-8 col-md-8 col-sm-8">
                            <div class="input-group mb-4">
                                @include('common.searchBox')
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <a href="javascript:void(0)" class=" btn btn-warning" data-toggle="modal" data-target="#themodal">
                                <i class="fa-solid fa-rectangle-ad"></i>
                                </i> Agregar
                            </a>
                        </div>
                    </div>
                    <div class="widget-content">
                        <div class="table-responsive">
                            <table class="table mb-4 table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th class="table-th text-dark">TITULO</th>
                                        <th class="table-th text-dark text-center">AUTOR</th>
                                        <th class="table-th text-dark text-center">RESERVA FECHA</th>  
                                        <th class="table-th text-dark text-center"ENTREGA FECHA</th>                                     
                                        <th class="table-th text-dark text-center">ACTIONS</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @if (count($reservations) == 0)
                                    <tr>
                                        <td colspan="7" class="text-center">
                                            <h6>No hay informacion Cargada.</h6>
                                        </td>
                                    </tr>
                                    @else
                                    @foreach ($reservations as $reser)
                                    <tr>
                                        <td>
                                            <h6 class="text-uppercase">{{$reser->id}}</h6>
                                        </td>
                                        <td class="text-center">
                                            <h6></h6>
                                        </td>
                                        <td class="text-center">
                                            <h6>{{$reser->days}}</h6>
                                        </td>
                                        <td class="text-center">
                                            <h6>{{$reser->description}}</h6>
                                        </td>
                                        <td class="text-center">
                                            <div class="bedge {{$reser->status == 'ACTIVE' ? 'badge-success' : 'badge-danger'}}">
                                                <span class="text-uppercase">{{$reser->status}}</span>
                                            </div>
                                        </td>

                                        <td class=" text-center">
                                            <a href=" javascript:void(0)" wire:click="Edit({{$reser->id}})" class="btn btn-success" title="Edit">
                                                <i class="fa-solid fa-pen-fancy"></i>

                                            </a>
                                            <a href="javascript:void(0)" onclick="Confirm('{{$reser->id}}')" class="btn btn-danger" title="DELETE">
                                                <i class="fa-solid fa-trash-can"></i>


                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @endif
                                </tbody>
                            </table>
                            kjsjsj

                        </div>
                    </div>
                </div>
            </div>
           @include('livewire.booking.form')
        </div>
        @include('livewire.book.event')
    </div>
</div>
</div>
