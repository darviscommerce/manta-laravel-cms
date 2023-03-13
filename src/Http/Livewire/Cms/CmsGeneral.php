<?php

namespace App\Http\Livewire\Cms;


use Livewire\Component;
use Manta\LaravelCms\Models\General;

class CmsGeneral extends Component
{
    public General $item;

    public ?string $company;
    public ?string $address;
    public ?string $zipcode;
    public ?string $city;
    public ?string $phone_input;
    public ?string $phone;
    public ?string $email;
    public ?string $facebook;
    public ?string $instagram;
    public ?string $twitter;

    public function mount()
    {
        $this->item = General::first();

        $this->company = $this->item->company;
        $this->address = $this->item->address;
        $this->zipcode = $this->item->zipcode;
        $this->city = $this->item->city;
        $this->phone_input = $this->item->phone_input;
        $this->phone = $this->item->phone;
        $this->email = $this->item->email;
        $this->facebook = $this->item->facebook;
        $this->instagram = $this->item->instagram;
        $this->twitter = $this->item->twitter;
    }

    public function render()
    {
        return view('livewire.cms.cms-general')->layout('layouts.manta-bootstrap');
    }

    public function store($input)
    {
        $this->validate(
            [
                'company' => 'required|min:1',
                'email' => 'required|email|unique:users,email,'.$this->item->id
            ],
            [
                'company.required' => 'Achternaam is verplicht',
                'email.required' => 'E-mail is verplicht',
                'email.email' => 'E-mailadres is niet geldig',
                'email.unique' => 'E-mailadres bestaat al'
            ]
        );

        $items = [
            'company' => $this->company,
            'address' => $this->company,
            'zipcode' => $this->company,
            'city' => $this->company,
            'phone_input' => $this->company,
            'phone' => $this->company,
            'email' => $this->company,
            'facebook' => $this->company,
            'instagram' => $this->company,
            'twitter' => $this->company,
        ];
        General::where('id', $this->item->id)->update($items);

        toastr()->addInfo('Gebruiker opgeslagen');
    }

}
