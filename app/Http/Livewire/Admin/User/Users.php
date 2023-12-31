<?php

namespace App\Http\Livewire\Admin\User;

use App\Models\Comic;
use App\Models\User;
use App\Notifications\StatusComic;
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
        foreach ($user->comics_created as $comic) {
            $comic->update(['status' => Comic::STANDBY]);
        }
        $user->profile->save();
        $user->notify(new StatusComic([
            'url' => route('users', $user),
            'message' => 'Tu cuenta ha sido verificada como original, actualiza las portadas de tus cómics para que sean visibles en la página principal'
        ]));
        $this->emitSelf('render');
    }
}
