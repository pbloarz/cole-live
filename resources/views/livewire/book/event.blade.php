<script>
    window.addEventListener('DOMContentLoaded', function() {
        window.livewire.on('item-added', Msg => {           
            $('#themodal').modal('hide')
            noty(Msg)
        })
        window.livewire.on('item-updated', Msg => {
            $('#themodal').modal('hide')
            noty(Msg)

        })
        window.livewire.on('item-deleted', Msg => {
            noty(Msg)

        })        
        window.livewire.on('hide-modal', Msg => {
            $('#themodal').modal('hide')

        })
        window.livewire.on('show-modal', Msg => {
            $('#themodal').modal('show')
        })        
        window.livewire.on('user-withsales', Msg => {
            noty(Msg)

        });



    });

    function Confirm(id) {    
        swal.fire({
            title: 'CONFIRMAR',
            text: 'CONFIRMAS ELIMINAR REGISTRO',
            type: 'warning',
            showCancelButton: true,
            cancelButtonText: 'Cerrar',
            cancelButtonColor: '#FFF',
            confirmButtonColor: '#3B3F5C',
            confirmButtonText: 'Aceptar'

        }).then(function(result) {
            if (result.value) {
                livewire.emit('deleteRow', id)
                swal.close()
            }
        })
    }
</script>