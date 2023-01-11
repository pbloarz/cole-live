<div>
    @include('common.modalHead')
    <div class="row">
        <div class="col-sm-12">
            <div class="form-group">
                <label>Usuario</label>
                <select wire:model="users_id" class="form-control">
                    <option value="Elegir">Elegir</option>
                    @foreach ($users as $user )
                    <option value="{{$user->id}}">{{$user->name}}</option>
                    @endforeach
                </select>
                @error('users_id') <span class="text-danger er">{{$message}}</span>@enderror
            </div>
        </div>
        <div class="col-sm-12">
            <div class="form-group">
                <label>Líbro</label>
                <select wire:model="books_id" class="form-control">
                    <option value="Elegir">Elegir</option>
                    @foreach ($books as $book )
                    <option value="{{$book->id}}">{{$book->title}}</option>
                    @endforeach
                </select>
                @error('books_id') <span class="text-danger er">{{$message}}</span>@enderror
            </div>
        </div>
        <div class="col-sm-12 col-md-8">
            <div class="form-group">
                <label>Fecha</label>
                <input type="date" wire:model.lazy="days" class="form-control" placeholder="Ej. Descripción breve">
                @error('days')
                <span class="text-danger er">{{$message}}</span>
                @enderror
            </div>
        </div>
    </div>


    @include('common.modalFooter')
</div>