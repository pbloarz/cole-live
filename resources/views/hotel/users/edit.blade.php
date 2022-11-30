@extends('layouts.theme.apps')
@section('content')

<div>
    <div class="row sales layout-top-spacing">
        <div class="col-sm-12">
            <div class="widget widget-chart-one">

                
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="input-group mb-3">
                            <h4 class="card-title">
                                <b>Usuarios | crear un nuevo usuario</b>

                            </h4>

                        </div>
                    </div>
                </div>


                <form action="{{route('saveUser')}}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="mb-3">
                                <label class="form-label">nombre</label>
                                <input type="text" class="form-control" name="name" value="{{$user->name}}" placeholder="nombre">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Correo eclectronico</label>
                                <input type="email" class="form-control"  name="email" value="{{$user->email}}" placeholder="name@example.com">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Contraseña</label>
                                <input type="password" class="form-control"  name="password" value="" placeholder="*******">
                            </div>


                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="mb-3">
                                <label>Tipo de usuario</label>
                                <select name="role" class="form-control">
                                    
                                    <option value="Admin">{{$user->role}}</option>
                                   
                                    
                                </select>
                            </div>
                            <div class="mb-3">
                                <div class="form-group custom-file">
                                    <input type="file" class="custom-file-input form-control" name="image" accept="image/x-png, image/git, image/jpeg">
                                    <label class="custom-file-label">Imágen</label>
                                </div>
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-dark">Guardar</button>
                                <a href="{{route('usuarios.index')}}" type="button" class="btn btn-danger">Cancelar</a>
                            </div>

                        </div>

                    </div>
                </form>


            </div>
        </div>

    </div>

</div>
@endsection