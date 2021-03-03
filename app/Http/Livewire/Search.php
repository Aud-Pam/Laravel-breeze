<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Search extends Component
{
    use WithPagination;
    public $searchQuery;
    public $success = false;

    public function mount()
    {
        $this->searchQuery = '';
    }

    public function render()
    {
        $users = User::when($this->searchQuery != '', function ($query) {
            $query->where('name', 'like', '%' . $this->searchQuery . '%');
        })->paginate(25);
        return view('livewire.search', compact('users'));
    }

    public function activateUser($id)
    {
        $user = User::find($id);
        if (!$user->active == 0) {
            $user->update(['active' => 0]);
        } else {
            $user->update(['active' => 1]);
        }
        $this->success = true;
        session()->flash('message', 'Successfully');
    }
}
