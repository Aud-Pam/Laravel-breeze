<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;


class EditUserProfile extends Component
{
    public $user;
    public $name;
    public $email;
    public $password_confirmation;
    public $password;
    public $success = false;

    public function mount()
    {
        $this->user = User::findOrFail(request('id'));
        $this->name = $this->user->name;
        $this->email = $this->user->email;
    }

    public function render()
    {
        return view('livewire.edit-user-profile');
    }

    public function updateUser($id)
    {
        $this->validate([
            'password' => 'required|min:3',
            'password_confirmation' => 'required|same:password|min:3'
        ]);
        User::find($id)->update([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password)
        ]);
        $this->success = true;
        session()->flash('message', 'succesfully updated');
    }
}
