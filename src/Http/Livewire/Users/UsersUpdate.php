<?php

namespace App\Http\Livewire\Users;

use Carbon\Carbon;
use Manta\LaravelCms\Models\MantaUser;
use Livewire\Component;

class UsersUpdate extends Component
{
    public MantaUser $item;

    public ?string $added_by = null;
    public ?string $changed_by = null;
    public ?string $company_id = null;
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

    public function mount($input)
    {
        $item = MantaUser::find($input);
        if ($item == null) {
            return redirect()->to(route('manta.users.list'));
        }
        $this->item = $item;
        $this->added_by = $item->added_by;
        $this->changed_by = $item->changed_by;
        $this->company_id = $item->company_id;
        $this->host = $item->host;
        $this->locale = $item->locale;
        $this->name = $item->name;
        $this->email = $item->email;
        $this->sex = $item->sex;
        $this->initials = $item->initials;
        $this->lastname = $item->lastname;
        $this->firstnames = $item->firstnames;
        $this->nameInsertion = $item->nameInsertion;
        $this->company = $item->company;
        $this->companyNr = $item->companyNr;
        $this->taxNr = $item->taxNr;
        $this->address = $item->address;
        $this->housenumber = $item->housenumber;
        $this->addressSuffix = $item->addressSuffix;
        $this->zipcode = $item->zipcode;
        $this->city = $item->city;
        $this->country = $item->country;
        $this->state = $item->state;
        $this->birthdate = $item->birthdate;
        $this->birthcity = $item->birthcity;
        $this->phone = $item->phone;
        $this->phone2 = $item->phone2;
        $this->bsn = $item->bsn;
        $this->iban = $item->iban;
        $this->maritalStatus = $item->maritalStatus;
        $this->lastLogin = $item->lastLogin;
        $this->code = $item->code;
        $this->pid = $item->pid;
    }

    public function render()
    {
        return view('livewire.users.users-update')->layout('layouts.manta-bootstrap');
    }

    public function store($input)
    {
        $this->validate(
            [
                'name' => 'required|min:1',
                'email' => 'required|email|unique:users,email,'.$this->item->id
            ],
            [
                'name.required' => 'Achternaam is verplicht',
                'email.required' => 'E-mail is verplicht',
                'email.email' => 'E-mailadres is niet geldig',
                'email.unique' => 'E-mailadres bestaat al'
            ]
        );

        $items = [
            'changed_by' => auth()->user()->name,
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
        MantaUser::where('id', $this->item->id)->update($items);

        toastr()->addInfo('Gebruiker opgeslagen');
    }
}
