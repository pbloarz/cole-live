<div>
    @include('common.modalHead')
    <div class="row">
        <div class="col-sm-12 col-md-12">
            <div class="form-group">
                <label>Titulo</label>
                <input type="text" wire:model.lazy="title" class="form-control" placeholder="Ej. lagrimas">
                @error('title')
                <span class="text-danger er">{{$message}}</span>
                @enderror
            </div>
        </div>
        <div class="col-sm-12">
            <label>Autor</label>
            <input type="text" wire:model.lazy="author" class="form-control" placeholder="Ej. Fernando de Torrez">
            @error('author')
            <span class="text-danger er">{{$message}}</span>
            @enderror
        </div>
        <div class="col-sm-12 col-md-8">
            <div class="form-group">
                <label>Descripcion</label>
                <input type="text" wire:model.lazy="description" class="form-control" placeholder="Ej. Descripción breve">
                @error('description')
                <span class="text-danger er">{{$message}}</span>
                @enderror
            </div>
        </div>
        <div class="col-sm-12 mt-3">
            <div class="form-group custom-file">
                <input type="file" class="custom-file-input form-control" wire:model="image" accept="image/x-png, image/git, image/jpeg">
                <label class="custom-file-label">Imágen {{$image}}</label>
                @error('image') <span class="text-danger er">{{$message}}</span>@enderror
            </div>
        </div>
    </div>

    @include('common.modalFooter')
</div>