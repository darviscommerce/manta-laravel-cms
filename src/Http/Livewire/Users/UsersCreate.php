<?php

namespace Manta\LaravelCms\Http\Livewire\Users;

use Carbon\Carbon;
use Manta\LaravelCms\Models\MantaUser;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersCreate extends Component
{

    public ?string $added_by = null;
    public ?string $changed_by = null;
    public ?string $company_id = '1';
    public ?string $host = null;
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

    public function render()
    {
        return view('manta-laravel-users::livewire.users.users-create')->layout('manta-laravel-users::layouts.manta-bootstrap');
    }

    public function store($input)
    {
        $this->validate(
            [
                'name' => 'required|min:1',
                'email' => 'required|email|unique:users,email'
            ],
            [
                'name.required' => 'Achternaam is verplicht',
                'email.required' => 'E-mail is verplicht',
                'email.email' => 'E-mailadres is niet geldig'
            ]
        );

        $items = [
            'changed_by' => auth()->user()->name,
            'host' => request()->getHost(),
            'company_id' => (int)$this->company_id,
            'password' => Hash::make(Str::random(20)),
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
