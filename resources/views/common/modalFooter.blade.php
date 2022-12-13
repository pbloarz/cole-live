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