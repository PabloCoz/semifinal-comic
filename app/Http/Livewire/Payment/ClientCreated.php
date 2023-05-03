<?php

namespace App\Http\Livewire\Payment;

use App\Models\Client;
use Livewire\Component;
use Culqi\Culqi;

class ClientCreated extends Component
{
    public $client;

    public $address, $city, $country_code, $email, $first_name, $last_name, $phone_number;

    protected $listeners = ['render'];

    protected $rules = [
        'client.address' => 'required',
        'client.city' => 'required',
        'client.country_code' => 'required',
        'client.email' => 'required|email',
        'client.first_name' => 'required',
        'client.last_name' => 'required',
        'client.phone_number' => 'required',
    ];

    public function mount()
    {
        $this->client = Client::where('user_id', auth()->user()->id)->first() ?? [];
    }

    public function render()
    {
        return view('livewire.payment.client-created');
    }

    public function save()
    {
        $this->validate([
            'address' => 'required',
            'city' => 'required',
            'country_code' => 'required',
            'email' => 'required|email',
            'first_name' => 'required',
            'last_name' => 'required',
            'phone_number' => 'required|min:9|max:11',
        ]);

        $culqi =  new Culqi(['api_key' => env('CULQI_SECRET_KEY')]);
        try {
            $client = $culqi->Customers->create(
                [
                    "address" => $this->address,
                    "address_city" => $this->city,
                    "country_code" => 'PE',
                    "email" => $this->email,
                    "first_name" => $this->first_name,
                    "last_name" => $this->last_name,
                    "phone_number" => $this->phone_number,
                ]
            );

            Client::updateOrCreate(
                ['user_id' => auth()->user()->id],
                [
                    'address' => $this->address,
                    'city' => $this->city,
                    'country_code' => $this->country_code,
                    'email' => $this->email,
                    'first_name' => $this->first_name,
                    'last_name' => $this->last_name,
                    'phone_number' => $this->phone_number,
                ]
            );

            auth()->user()->customer_id = $client->id;
            auth()->user()->save();
            session()->flash('success', 'Cliente creado correctamente');
            $this->emitSelf('render');
            
        } catch (\Exception $e) {
            session()->flash('error', $e->getMessage());
        }
    }

    public function update()
    {
        $this->validate();

        $culqi = new Culqi(array('api_key' => env('CULQI_SECRET_KEY')));
        try {
            $culqi->Customers->update(
                auth()->user()->customer_id,
                [
                    "address" => $this->client['address'],
                    "address_city" => $this->client['city'],
                    "country_code" => 'PE',
                    "email" => $this->client['email'],
                    "first_name" => $this->client['first_name'],
                    "last_name" => $this->client['last_name'],
                    "phone_number" => $this->client['phone_number'],
                ]
            );

            Client::updateOrCreate(
                ['user_id' => auth()->user()->id],
                [
                    'address' => $this->client['address'],
                    'city' => $this->client['city'],
                    'country_code' => $this->client['country_code'],
                    'email' => $this->client['email'],
                    'first_name' => $this->client['first_name'],
                    'last_name' => $this->client['last_name'],
                    'phone_number' => $this->client['phone_number'],
                ]
            );
            $this->emitSelf('render');
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }
}
