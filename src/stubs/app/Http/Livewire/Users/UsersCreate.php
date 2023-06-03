<?php

namespace App\Http\Livewire\Users;

use Carbon\Carbon;
use Manta\LaravelCms\Models\MantaUser;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersCreate extends Component
{

    public ?string $created_by = null;
    public ?string $updated_by = null;
    public ?string $company_id = '1';
    public ?string $host = null;
    public ?string $password = null;
    public ?string $locale = null;
    public ?string $name = null;
    public ?string $email = null;
    public ?string $sex = null;
    public ?string $initials = null;
    public ?string $lastname = null;
    public ?string $firstnames = null;
    public ?string $nameInsertion = null;
    public ?string $company = null;
    public ?string $companyNr = null;
    public ?string $taxNr = null;
    public ?string $address = null;
    public ?string $housenumber = null;
    public ?string $addressSuffix = null;
    public ?string $zipcode = null;
    public ?string $city = null;
    public ?string $country = null;
    public ?string $state = null;
    public ?string $birthdate = null;
    public ?string $birthcity = null;
    public ?string $phone = null;
    public ?string $phone2 = null;
    public ?string $bsn = null;
    public ?string $iban = null;
    public ?string $maritalStatus = null;
    public ?string $lastLogin = null;
    public ?string $code = null;
    public ?string $pid = null;

    public function mount()
    {
        $this->locale = app()->getLocale();
        $this->password = fake()->state() . fake('nl_NL')->numberBetween(10, 999) . fake('nl_NL')->randomElement(['!', '@', '#', '$', '%', '^', '&', '*', '(', ')']);
    }

    public function render()
    {
        return view('livewire.users.users-create')->layout('layouts.manta-bootstrap');
    }

    public function store($input)
    {
        $this->validate(
            [
                'name' => 'required|min:1',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:6',
            ],
            [
                'name.required' => 'Roepnaam is verplicht',
                'email.required' => 'E-mail is verplicht',
                'email.email' => 'E-mailadres is niet geldig',
                'password.required' => 'Wachtwoord is verplicht',
                'password.min' => 'Het wachtwoord moet minstens 6 karakters hebben',
            ]
        );

        $items = [
            'updated_by' => auth()->user()->name,
            'host' => request()->getHost(),
            'company_id' => (int)$this->company_id,
            'password' => Hash::make($this->password),
            'locale' => $this->locale,
            'name' => $this->name,
            'email' => $this->email,
            'sex' => $this->sex,
            'initials' => $this->initials,
            'lastname' => $this->lastname,
            'firstnames' => $this->firstnames,
            'nameInsertion' => $this->nameInsertion,
            'company' => $this->company,
            'companyNr' => $this->companyNr,
            'taxNr' => $this->taxNr,
            'address' => $this->address,
            'housenumber' => $this->housenumber,
            'addressSuffix' => $this->addressSuffix,
            'zipcode' => $this->zipcode,
            'city' => $this->city,
            'country' => $this->country,
            'state' => $this->state,
            'birthdate' => $this->birthdate && Carbon::parse($this->birthdate)->isValid() ? Carbon::parse($this->birthdate)->format('Y-m-d') : null,
            'birthcity' => $this->birthcity,
            'phone' => $this->phone,
            'phone2' => $this->phone2,
            'bsn' => $this->bsn,
            'iban' => $this->iban,
            'maritalStatus' => $this->maritalStatus,
            'lastLogin' => $this->lastLogin,
            'code' => $this->code,
            'pid' => $this->pid,
        ];
        MantaUser::create($items);

        toastr()->addInfo('Gebruiker opgeslagen');

        return redirect()->to(route('manta.users.list'));
    }
}
