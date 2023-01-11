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
                                        <th class="table-th text-dark text-center">DESCRIPCION</th>
                                        <th class="table-th text-dark text-center">ESTADO</th>
                                        <th class="table-th text-dark text-center">ACTIONS</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @if (count($books) == 0)
                                    <tr>
                                        <td colspan="7" class="text-center">
                                            <h6>No hay informacion Cargada.</h6>
                                        </td>
                                    </tr>
                                    @else
                                    @foreach ($books as $book)
                                    <tr>
                                        <td>
                                            <h6 class="text-uppercase">{{$book->title}}</h6>
                                        </td>
                                        <td class="text-center">
                                            <h6>{{$book->author}}</h6>
                                        </td>
                                        <td class="text-center">
                                            <h6>{{$book->description}}</h6>
                                        </td>
                                        <td class="text-center">
                                            <div class="bedge {{$book->status == 'ACTIVE' ? 'badge-success' : 'badge-danger'}}">
                                                <span class="text-uppercase">{{$book->status}}</span>
                                            </div>
                                        </td>

                                        <td class=" text-center">
                                            <a href=" javascript:void(0)" wire:click="Edit({{$book->id}})" class="btn btn-success" title="Edit">
                                                <i class="fa-solid fa-pen-fancy"></i>

                                            </a>
                                            <a href="javascript:void(0)" onclick="Confirm('{{$book}}')" class="btn btn-danger" title="DELETE">
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
            @include('livewire.book.form')
        </div>
        @include('livewire.book.event')
    </div>
</div>