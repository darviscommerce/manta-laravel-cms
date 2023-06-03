@section('module', 'users')
@section('title', 'Gebruiker toevoegen')
<div class="container">
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('manta.users.list') }}">Gebruikers</a></li>
            <li class="breadcrumb-item active" aria-current="page">Toevoegen</li>
        </ol>
    </nav>
    <form wire:submit.prevent="store(Object.fromEntries(new FormData($event.target)))">
        <h4 class="text-primary">Persoonlijke gegevens</h4>
        @if (count(config('manta-cms.locales')) > 1 && in_array('locale', config('manta-user.fields')))
            <div class="mb-3 row">
                <label for="locale" class="col-sm-2 col-form-label">Taal voorkeur</label>
                <div class="col-sm-4">
                    <select class="form-control form-control-sm @error('locale')is-invalid @enderror" id="locale"
                        wire:model.defer="locale">
                        <option value="">Maak een keuze</option>
                        @foreach (config('manta-cms.locales') as $key => $value)
                            <option value="{{ $key }}">{{ $value['language'] }}</option>
                        @endforeach
                    </select>
                    @error('locale')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>
                <label for="" class="col-sm-2 col-form-label"></label>
                <div class="col-sm-4">
                </div>
            </div>
        @endif
        <div class="mb-3 row">
            <label for="email" class="col-sm-2 col-form-label">E-mail *</label>
            <div class="col-sm-4">
                <input type="email" class="form-control form-control-sm @error('email')is-invalid @enderror"
                    id="email" wire:model.defer="email">
                @error('email')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
            <label for="" class="col-sm-2 col-form-label"></label>
            <div class="col-sm-4">
            </div>
        </div>
        @if (in_array('password', config('manta-user.fields')))
            <div class="mb-3 row">
                <label for="password" class="col-sm-2 col-form-label">Wachtwoord</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control form-control-sm @error('password')is-invalid @enderror"
                        id="password" wire:model.defer="password">
                    @error('password')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>
                <label for="" class="col-sm-2 col-form-label"></label>
                <div class="col-sm-4">
                </div>
            </div>
        @endif
        @if (in_array('sex', config('manta-user.fields')) || in_array('initials', config('manta-user.fields')))
            <div class="mb-3 row">
                @if (in_array('sex', config('manta-user.fields')))
                    <label for="sex" class="col-sm-2 col-form-label">Geslacht</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control form-control-sm @error('sex')is-invalid @enderror"
                            id="sex" wire:model.defer="sex">
                        @error('sex')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                @endif
                @if (in_array('initials', config('manta-user.fields')))
                    <label for="initials" class="col-sm-2 col-form-label">Initialen</label>
                    <div class="col-sm-4">
                        <input type="text"
                            class="form-control form-control-sm @error('initials')is-invalid @enderror" id="initials"
                            wire:model.defer="initials">
                        @error('initials')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                @endif
            </div>
        @endif

        <div class="mb-3 row">
            <label for="name" class="col-sm-2 col-form-label">Roepnaam *</label>
            <div class="col-sm-4">
                <input type="text" class="form-control form-control-sm @error('name')is-invalid @enderror"
                    id="name" wire:model.defer="name">
                @error('name')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
            @if (in_array('firstnames', config('manta-user.fields')))
                <label for="firstnames" class="col-sm-2 col-form-label">Voornamen</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control form-control-sm @error('firstnames')is-invalid @enderror"
                        id="firstnames" wire:model.defer="firstnames">
                    @error('firstnames')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>
            @endif
        </div>
        @if (in_array('name', config('manta-user.fields')) || in_array('firstnames', config('manta-user.fields')))
            <div class="mb-3 row">
                @if (in_array('lastname', config('manta-user.fields')))
                    <label for="lastname" class="col-sm-2 col-form-label">Achternaam</label>
                    <div class="col-sm-4">
                        <input type="text"
                            class="form-control form-control-sm @error('lastname')is-invalid @enderror" id="lastname"
                            wire:model.defer="lastname">
                        @error('lastname')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                @endif
                @if (in_array('nameInsertion', config('manta-user.fields')))
                    <label for="nameInsertion" class="col-sm-2 col-form-label">Tussenvoegsel</label>
                    <div class="col-sm-4">
                        <input type="text"
                            class="form-control form-control-sm @error('nameInsertion')is-invalid @enderror"
                            id="nameInsertion" wire:model.defer="nameInsertion">
                        @error('nameInsertion')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                @endif
            </div>
        @endif
        @if (in_array('company', config('manta-user.fields')))
            <h4 class="text-primary">Bedrijfsgegevens</h4>
            <div class="mb-3 row">
                <label for="company" class="col-sm-2 col-form-label">Bedrijfsnaam</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control form-control-sm @error('company')is-invalid @enderror"
                        id="company" wire:model.defer="company">
                    @error('company')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>
                <label for="" class="col-sm-2 col-form-label"></label>
                <div class="col-sm-4">
                </div>
            </div>
        @endif
        @if (in_array('companyNr', config('manta-user.fields')) || in_array('taxNr', config('manta-user.fields')))
            <div class="mb-3 row">
                @if (in_array('companyNr', config('manta-user.fields')))
                    <label for="companyNr" class="col-sm-2 col-form-label">KVK-nummer</label>
                    <div class="col-sm-4">
                        <input type="text"
                            class="form-control form-control-sm @error('companyNr')is-invalid @enderror"
                            id="companyNr" wire:model.defer="companyNr">
                        @error('companyNr')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                @endif
                @if (in_array('taxNr', config('manta-user.fields')))
                    <label for="taxNr" class="col-sm-2 col-form-label">BTW-nummer</label>
                    <div class="col-sm-4">
                        <input type="text"
                            class="form-control form-control-sm @error('taxNr')is-invalid @enderror" id="taxNr"
                            wire:model.defer="taxNr">
                        @error('taxNr')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                @endif
            </div>
        @endif
        @if (in_array('phone', config('manta-user.fields')) || in_array('phone2', config('manta-user.fields')))
            <h4 class="text-primary">Contact gegevens</h4>




            @if (in_array('phone', config('manta-user.fields')) || in_array('phone2', config('manta-user.fields')))
                <div class="mb-3 row">
                    @if (in_array('phone', config('manta-user.fields')))
                        <label for="phone" class="col-sm-2 col-form-label">Telefoon 1</label>
                        <div class="col-sm-4">
                            <input type="text"
                                class="form-control form-control-sm @error('phone')is-invalid @enderror"
                                id="phone" wire:model.defer="phone">
                            @error('phone')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </div>
                    @endif
                    @if (in_array('phone2', config('manta-user.fields')))
                        <label for="phone2" class="col-sm-2 col-form-label">Telefoon 2</label>
                        <div class="col-sm-4">
                            <input type="text"
                                class="form-control form-control-sm @error('phone2')is-invalid @enderror"
                                id="phone2" wire:model.defer="phone2">
                            @error('phone2')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </div>
                    @endif
                </div>
            @endif
        @endif
        @if (in_array('address', config('manta-user.fields')) ||
                in_array('housenumber', config('manta-user.fields')) ||
                in_array('addressSuffix', config('manta-user.fields')) ||
                in_array('zipcode', config('manta-user.fields')) ||
                in_array('city', config('manta-user.fields')) ||
                in_array('country', config('manta-user.fields')) ||
                in_array('state', config('manta-user.fields')))
            <h4 class="text-primary">Adres gegevens</h4>
            @if (in_array('address', config('manta-user.fields')) ||
                    in_array('housenumber', config('manta-user.fields')) ||
                    in_array('addressSuffix', config('manta-user.fields')))
                <div class="mb-3 row">
                    @if (in_array('address', config('manta-user.fields')))
                        <label for="address" class="col-sm-2 col-form-label">Straat</label>
                        <div class="col-sm-4">
                            <input type="text"
                                class="form-control form-control-sm @error('address')is-invalid @enderror"
                                id="address" wire:model.defer="address">
                            @error('address')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </div>
                    @endif
                    @if (in_array('housenumber', config('manta-user.fields')))
                        <label for="housenumber" class="col-sm-2 col-form-label">Huisnr</label>
                        <div class="col-sm-2">
                            <input type="text"
                                class="form-control form-control-sm @error('housenumber')is-invalid @enderror"
                                id="housenumber" wire:model.defer="housenumber">
                            @error('housenumber')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </div>
                    @endif
                    @if (in_array('addressSuffix', config('manta-user.fields')))
                        <div class="col-sm-2">
                            <input type="text"
                                class="form-control form-control-sm @error('addressSuffix')is-invalid @enderror"
                                id="addressSuffix" wire:model.defer="addressSuffix" placeholder="Toevoeging">
                            @error('addressSuffix')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </div>
                    @endif
                </div>
            @endif
            @if (in_array('zipcode', config('manta-user.fields')) || in_array('city', config('manta-user.fields')))
                <div class="mb-3 row">
                    @if (in_array('zipcode', config('manta-user.fields')))
                        <label for="zipcode" class="col-sm-2 col-form-label">Postcode</label>
                        <div class="col-sm-4">
                            <input type="text"
                                class="form-control form-control-sm @error('zipcode')is-invalid @enderror"
                                id="zipcode" wire:model.defer="zipcode">
                            @error('zipcode')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </div>
                    @endif
                    @if (in_array('city', config('manta-user.fields')))
                        <label for="city" class="col-sm-2 col-form-label">Woonplaats</label>
                        <div class="col-sm-4">
                            <input type="text"
                                class="form-control form-control-sm @error('city')is-invalid @enderror"
                                id="city" wire:model.defer="city">
                            @error('city')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </div>
                    @endif
                </div>
            @endif
            @if (in_array('country', config('manta-user.fields')) || in_array('state', config('manta-user.fields')))
                <div class="mb-3 row">
                    @if (in_array('country', config('manta-user.fields')))
                        <label for="country" class="col-sm-2 col-form-label">Land</label>
                        <div class="col-sm-4">
                            <input type="text"
                                class="form-control form-control-sm @error('country')is-invalid @enderror"
                                id="country" wire:model.defer="country">
                            @error('country')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </div>
                    @endif
                    @if (in_array('state', config('manta-user.fields')))
                        <label for="state" class="col-sm-2 col-form-label">Provincie</label>
                        <div class="col-sm-4">
                            <input type="text"
                                class="form-control form-control-sm @error('state')is-invalid @enderror"
                                id="state" wire:model.defer="state">
                            @error('state')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </div>
                    @endif
                </div>
            @endif
        @endif





        @if (in_array('bsn', config('manta-user.fields')) ||
                in_array('iban', config('manta-user.fields')) ||
                in_array('birthdate', config('manta-user.fields')) ||
                in_array('birthcity', config('manta-user.fields')) ||
                in_array('maritalStatus', config('manta-user.fields')))
            <h4 class="text-primary">Overige gegevens</h4>
            @if (in_array('birthdate', config('manta-user.fields')) || in_array('birthcity', config('manta-user.fields')))
                <div class="mb-3 row">
                    @if (in_array('birthdate', config('manta-user.fields')))
                        <label for="birthdate" class="col-sm-2 col-form-label">Geboortedatum</label>
                        <div class="col-sm-4">
                            <input type="date"
                                class="form-control form-control-sm @error('birthdate')is-invalid @enderror"
                                id="birthdate" wire:model.defer="birthdate">
                            @error('birthdate')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </div>
                    @endif
                    @if (in_array('birthcity', config('manta-user.fields')))
                        <label for="birthcity" class="col-sm-2 col-form-label">Geboorteplaats</label>
                        <div class="col-sm-4">
                            <input type="text"
                                class="form-control form-control-sm @error('birthcity')is-invalid @enderror"
                                id="birthcity" wire:model.defer="birthcity">
                            @error('birthcity')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </div>
                    @endif
                </div>
            @endif
            @if (in_array('bsn', config('manta-user.fields')) || in_array('iban', config('manta-user.fields')))
                <div class="mb-3 row">
                    @if (in_array('bsn', config('manta-user.fields')))
                        <label for="bsn" class="col-sm-2 col-form-label">BSN-nummer</label>
                        <div class="col-sm-4">
                            <input type="text"
                                class="form-control form-control-sm @error('bsn')is-invalid @enderror" id="bsn"
                                wire:model.defer="bsn">
                            @error('bsn')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </div>
                    @endif
                    @if (in_array('iban', config('manta-user.fields')))
                        <label for="iban" class="col-sm-2 col-form-label">IBAN-nummer</label>
                        <div class="col-sm-4">
                            <input type="text"
                                class="form-control form-control-sm @error('iban')is-invalid @enderror"
                                id="iban" wire:model.defer="iban">
                            @error('iban')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </div>
                    @endif
                </div>
            @endif
            @if (in_array('maritalStatus', config('manta-user.fields')))
                <div class="mb-3 row">
                    <label for="maritalStatus" class="col-sm-2 col-form-label">Burgerlijke staat</label>
                    <div class="col-sm-4">
                        <input type="text"
                            class="form-control form-control-sm @error('maritalStatus')is-invalid @enderror"
                            id="maritalStatus" wire:model.defer="maritalStatus">
                        @error('maritalStatus')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                    <label for="" class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-4">
                    </div>
                </div>
            @endif
        @endif
        <div class="mb-3 row">
            <div class="col-sm-12">
                {{-- @include('includes.form_error') --}}
                <input class="btn btn-sm btn-primary" type="submit" value="Opslaan"
                    wire:loading.class="btn-secondary" wire:loading.attr="disabled" />
            </div>
        </div>
    </form>
</div>
