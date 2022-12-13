<div wire:ignore.self class="modal fade" id="themodalUsers" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <h5 class="modal-title">
                    <p class="text-white">{{$componentName}} | {{$selected_id > 0 ? 'EDITAR' : 'CREAR'}}</p>
                </h5>
                <h6 class="text-center text-white" wire:loading>Cargando..</h6>
            </div>
            <div class="modal-body">

                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="mb-3">
                            <label class="form-label">nombre</label>
                            <input type="text" class="form-control" wire:model.lazy="name" placeholder="nombre">
                            @error('name')
                            <span class="text-danger er">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Correo eclectronico</label>
                            <input type="email" class="form-control" wire:model.lazy="email" placeholder="name@example.com">
                            @error('email')
                            <span class="text-danger er">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Contraseña</label>
                            <input type="password" class="form-control"wire:model.lazy="password" placeholder="*******">
                            @error('password')
                            <span class="text-danger er">{{$message}}</span>
                            @enderror
                        </div>


                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="mb-3">
                            <label>Tipo de usuario</label>
                            <select  wire:model.lazy="role" class="form-control">
                                <option value="Elegir">Elegir</option>
                                <option value="Admin">Admin</option>
                            </select>
                            @error('role')
                            <span class="text-danger er">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <div class="form-group custom-file">
                                <input type="file" class="custom-file-input form-control" accept="image/x-png, image/git, image/jpeg">
                                <label class="custom-file-label">Imágen</label>
                            </div>
                        </div>


                    </div>

                </div>

            </div>
            <div class="modal-footer">
                <button type="button" wire:click.prevent="resetUI()" class="btn btn-primary close-btn" data-dismiss="modal">
                    CERRAR
                    <i class="fa-solid fa-rectangle-xmark"></i>

                </button>

                @if ($selected_id <1) <button type="button" wire:click.prevent="Store()" class="btn btn-success close-modal">
                    GUARDAR
                    <i class="fa-solid fa-paper-plane"></i>

                    </button>
                    @else
                    <button type="button" wire:click.prevent="Update()" class="btn btn-warning close-modal">
                        ACTUALIZAR
                        <i class="fa-solid fa-highlighter"></i>
                    </button>


                    @endif
            </div>

        </div>

    </div>

</div>