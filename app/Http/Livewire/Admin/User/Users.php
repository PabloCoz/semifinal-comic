<?php

namespace App\Http\Livewire\Admin\User;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Users extends Component
{
    use WithPagination;

    public $search;

    protected $listeners = ['render'];

    public function render()
    {
        $users = User::where('username', 'like', '%' . $this->search . '%')->paginate(10);
        return view('livewire.admin.user.users', compact('users'));
    }

    public function clearPage()
    {
        $this->resetPage();
    }

    public function blockUser(User $user)
    {
        $user->update(['status' => 0]);
        $this->emitSelf('render');
    }

    public function unblockUser(User $user)
    {
        $user->update(['status' => 1]);
        $this->emitSelf('render');
    }

    public function makeOriginal($user)
    {
        $user = User::find($user);
        $user->profile->is_original = 1;
        $user->profile->save();
        $this->emitSelf('render');
    }
}
