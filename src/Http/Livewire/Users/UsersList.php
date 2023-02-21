<?php

namespace Manta\LaravelUsers\Http\Livewire\Users;

use Manta\LaravelUsers\Models\MantaUser;
use Manta\LaravelUsers\Traits\WithSorting;
use Livewire\Component;
use Livewire\WithPagination;

class UsersList extends Component
{
    use WithPagination;
    use WithSorting;

    protected $paginationTheme = 'bootstrap';

    public $search;
    protected $queryString = ['search'];

    public string $show = 'active';
    public ?int $trashed = null;
    public ?string $deleteId = null;

    public function mount()
    {
        $this->sortBy = 'name';
        $this->sortDirection = 'ASC';
    }

    public function render()
    {
        $obj = MantaUser::orderBy($this->sortBy, $this->sortDirection);
        if($this->show == 'trashed'){
            $obj->onlyTrashed();
        }
        if($this->search){
            $keyword = $this->search;
            $obj->where(function ($query) use($keyword) {
                $query->where('name', 'like', '%' . $keyword . '%')
                   ->orWhere('email', 'like', '%' . $keyword . '%');
              });
        // ->where('name', 'like', '%'.$this->search.'%')->orWhere('email', 'like', '%'.$this->search.'%');
        }
        $items = $obj->paginate(20);
        return view('manta-laravel-users::livewire.users.users-list', ['items' => $items])->layout('manta-laravel-users::layouts.manta-bootstrap');
    }

    public function loadTrash()
    {
        $this->trashed = count(MantaUser::onlyTrashed()->get());
    }

    public function show($show)
    {
        $this->show = $show;
    }

    public function delete($id)
    {
        $this->deleteId = $id;
    }

    public function deleteCancel()
    {
        $this->deleteId = null;
    }

    public function deleteConfirm()
    {
        MantaUser::find($this->deleteId)->delete();
        $this->deleteId = null;
        $this->trashed = count(MantaUser::onlyTrashed()->get());
    }

    public function restore($id)
    {
        MantaUser::withTrashed()->where('id', $id)->restore();
        $this->trashed = count(MantaUser::onlyTrashed()->get());
        $this->show = 'active';
    }
}
