@include('common.modalHead')
<div class="row">
    <div class="col-sm-12">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">
                    <span class="fas fa-edit">

                    </span>
                </span>
            </div>
            @if ($selected_id < 1) <input type="text" wire:model.lazy="roleName" wire:keydown.enter="CreateRole()" class="form-control" placeholder="Ej: Admin" maxlength="255">

                @else
                <input type="text" wire:model.lazy="roleName" wire:keydown.enter="UpdatedRole()" class="form-control" placeholder="Ej: Admin" maxlength="255">

                @endif
        </div>
        @error('roleName') <span class="text-danger er">{{$message}}</span>@enderror

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
        <button type="button" wire:click.prevent="UpdatedRole()" class="btn btn-warning close-modal">
            ACTUALIZAR
            <i class="fa-solid fa-highlighter"></i>
        </button>


        @endif
</div>

</div>

</div>

</div>