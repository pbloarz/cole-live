<?php

namespace App\Http\Livewire;

use App\Models\book as ModelsBook;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

use function PHPUnit\Framework\fileExists;

class Book extends Component
{

    use WithFileUploads;
    use WithPagination;

    public  $title;
    public $author;
    public $image;
    public $description;
    public $selected_id;
    public $search;

    public function mount()
    {
        $this->pageTitle = 'Listado de libros';
        $this->componentName = 'Libros';
    }
    public function render()
    {
        if (strlen($this->search) > 0)
            $books = ModelsBook::where('title', 'like', '%' . $this->search . '%')
                ->select('*')->orderBy('title')->paginate(20);
        else
            $books = ModelsBook::select('*')->orderBy('title')             
                ->paginate(20);

        return view('livewire.book.book', compact('books'))->extends('layouts.theme.apps')
            ->section('content');
    }

    public function Store()
    {
        $rules = [
            'title'  => 'required|min:10',
            'author' => 'required',
            'description' => 'required'

        ];
        $messages = [

            'title.required' => 'Titulo requerido',
            'title.min' => 'El titulo del usuario debe tener al menos 10 caracteres',
            'author.required' => 'Author requerido',
            'description.required' => 'Author requerido',


        ];

        $this->validate($rules, $messages);
        $book = ModelsBook::create([
            'title' => $this->title,
            'author' => $this->author,
            'description' => $this->description,
            'imagen' => $this->image,
        ]);
        $customFileName;
        if ($this->image) {
            $customFileName = uniqid() . '_.' . $this->image->extension();
            $this->image->storeAs('public/categories', $customFileName);
            $book->imagen = $customFileName;
            $book->save();
        }
        $this->emit('item-added', 'Líbro Registrada');
    }

    public function Edit($id)
    {
        $record = ModelsBook::find($id, ['id', 'title', 'author', 'description']);
        $this->title = $record->title;
        $this->author = $record->author;
        $this->description = $record->author;

        $this->selected_id = $record->id;
        $this->image = $record->null;

        $this->emit('show-modal', 'show modal!');
    }
    public function Update()
    {
        $rules = [
            'title' => "required|unique:books,title,{$this->selected_id}|min:10",
        ];

        $this->validate($rules);
        $book = ModelsBook::find($this->selected_id);
        $book->update([
            'title' => $this->title,

        ]);

        if ($this->image) {
            $customFileName = uniqid() . '_.' . $this->image->extension();
            $this->image->storeAs('public/categories/', $customFileName);
            $imageName = $book->imagen;

            $book->image = $customFileName;
            $book->save();

            if ($imageName != null) {
                if (!fileExists('storage/categories' . $imageName)) {
                    unlink('storage/categories' . $imageName);
                }
            }
        }

        $this->emit('item-updated', 'líbro Actualizar');
    }

    protected $listeners = [
        'deletedRow' => 'Destroy',
                       
    ];
    public function Destroy(ModelsBook $book)
    {

        $imageName = $book->image;
        $book->delete();
        if ($imageName != null) {
            if (!fileExists('storage/categories' . $imageName)) {
                unlink('storage/categories' . $imageName);
            } else {
                return;
            }
        }
     
        $this->emit('item-deleted', 'Categoría Eliminada');
    }
}
