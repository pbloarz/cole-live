<div wire:ignore.self class="modal fade" id="themodal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <h5 class="modal-title" >
                    <p class="text-white">{{$componentName}} | {{$selected_id > 0 ? 'EDITAR' : 'CREAR'}}</p>
                </h5>
                <h6 class="text-center text-white"  wire:loading>Cargando..</h6>                
            </div>
            <div class="modal-body">


          