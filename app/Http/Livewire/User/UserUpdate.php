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
        //'profile.phone' => 'required',
        //'profile.address' => 'required',
        //'profile.country' => 'required',
        //'profile.city' => 'required',
        'profile.bio' => 'required',
        //'profile.facebook' => 'required',
        //'profile.instagram' => 'required',
        'img' => 'nullable|image|max:3072',
    ];

    protected $messages = [
        'profile.name.required' => 'El nombre es requerido',
        'profile.lastname.required' => 'El apellido es requerido',
        'profile.email.required' => 'El email es requerido',
        'profile.email.email' => 'El email no es válido',
        //'profile.phone.required' => 'El teléfono es requerido',
        //'profile.address.required' => 'La dirección es requerida',
        //'profile.country.required' => 'El país es requerido',
        //'profile.city.required' => 'La ciudad es requerida',
        'profile.bio.required' => 'La biografía es requerida',
        //'profile.facebook.required' => 'El facebook es requerido',
        //'profile.instagram.required' => 'El instagram es requerido',
        'img.image' => 'El archivo debe ser una imagen',
        'img.max' => 'El archivo no debe pesar más de 3MB',
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
                    'phone' => $this->profile['phone'] ?? null,
                    'address' => $this->profile['address'] ?? null,
                    'country' => $this->profile['country'] ?? null,
                    'city' => $this->profile['city'] ?? null,
                    'bio' => $this->profile['bio'],
                    'facebook' => $this->profile['facebook'] ?? null,
                    'instagram' => $this->profile['instagram'] ?? null,
                    'front_page' => $this->img ? $url : $this->profile['front_page'] ?? null,
                ]
            );

            auth()->user()->is_creator = true;
            auth()->user()->save();
            auth()->user()->assignRole('Creador');
            session()->flash('message', 'Perfil actualizado correctamente.');
            return redirect()->route('creator.comics.index');
        } catch (\Exception $e) {
            session()->flash('error', $e->getMessage());
        }
    }
}
