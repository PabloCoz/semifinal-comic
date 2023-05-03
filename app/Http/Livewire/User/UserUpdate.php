<?php

namespace App\Http\Livewire\User;

use App\Models\Profile;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class UserUpdate extends Component
{
    use WithFileUploads;

    public $profile, $img;

    protected $rules = [
        'profile.name' => 'required',
        'profile.lastname' => 'required',
        'profile.email' => 'required|email',
        'profile.phone' => 'required',
        'profile.address' => 'required',
        'profile.country' => 'required',
        'profile.city' => 'required',
        'profile.bio' => 'required',
        'profile.facebook' => 'required',
        'profile.instagram' => 'required',
    ];

    public function mount()
    {
        $this->profile = auth()->user()->profile ?? [];
    }

    public function render()
    {
        return view('livewire.user.user-update');
    }

    public function store()
    {
        $this->validate();
        try {
            if ($this->img) {
                if (auth()->user()->profile) {
                    if ($this->profile['front_page']) {
                        Storage::delete($this->profile['front_page']);
                        $url = Storage::put('front_page', $this->img);
                    }
                }

                $url = Storage::put('front_page', $this->img);
            }

            Profile::updateOrCreate(
                ['user_id' => auth()->user()->id],
                [
                    'name' => $this->profile['name'],
                    'lastname' => $this->profile['lastname'],
                    'email' => $this->profile['email'],
                    'phone' => $this->profile['phone'],
                    'address' => $this->profile['address'],
                    'country' => $this->profile['country'],
                    'city' => $this->profile['city'],
                    'bio' => $this->profile['bio'],
                    'facebook' => $this->profile['facebook'],
                    'instagram' => $this->profile['instagram'],
                    'front_page' => $url ?? $this->profile['front_page'],
                ]
            );

            auth()->user()->is_creator = true;
            auth()->user()->save();
            auth()->user()->assignRole('Creador');
            session()->flash('message', 'Profile updated successfully.');
        } catch (\Exception $e) {
            session()->flash('error', $e->getMessage());
        }
    }
}
