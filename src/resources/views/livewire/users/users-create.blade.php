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
        @if (count(config('manta-users.locales')) > 1)
        <div class="mb-3 row">
            <label for="locale" class="col-sm-2 col-form-label">Taal voorkeur</label>
            <div class="col-sm-4">
                <select class="form-control form-control-sm @error('locale')is-invalid @enderror"
                    id="locale" wire:model.defer="locale">
                    <option value="">Maak een keuze</option>
                    @foreach (config('manta-users.locales') as $key => $value)
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
            <label for="sex" class="col-sm-2 col-form-label">Titel</label>
            <div class="col-sm-4">
                <input type="text" class="form-control form-control-sm @error('sex')is-invalid @enderror"
                    id="sex" wire:model.defer="sex">
                @error('sex')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
            <label for="initials" class="col-sm-2 col-form-label">Initialen</label>
            <div class="col-sm-4">
                <input type="text" class="form-control form-control-sm @error('initials')is-invalid @enderror"
                    id="initials" wire:model.defer="initials">
                @error('initials')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="mb-3 row">
            <label for="name" class="col-sm-2 col-form-label">Roepnaam *</label>
            <div class="col-sm-4">
                <input type="text" class="form-control form-control-sm @error('name')is-invalid @enderror"
                    id="name" wire:model.defer="name">
                @error('name')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
            <label for="firstnames" class="col-sm-2 col-form-label">Voornamen</label>
            <div class="col-sm-4">
                <input type="text" class="form-control form-control-sm @error('firstnames')is-invalid @enderror"
                    id="firstnames" wire:model.defer="firstnames">
                @error('firstnames')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="mb-3 row">
            <label for="lastname" class="col-sm-2 col-form-label">Achternaam</label>
            <div class="col-sm-4">
                <input type="text" class="form-control form-control-sm @error('lastname')is-invalid @enderror"
                    id="lastname" wire:model.defer="lastname">
                @error('lastname')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
            <label for="nameInsertion" class="col-sm-2 col-form-label">Tussenvoegsel</label>
            <div class="col-sm-4">
                <input type="text" class="form-control form-control-sm @error('nameInsertion')is-invalid @enderror"
                    id="nameInsertion" wire:model.defer="nameInsertion">
                @error('nameInsertion')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
        </div>
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
        <div class="mb-3 row">
            <label for="companyNr" class="col-sm-2 col-form-label">KVK-nummer</label>
            <div class="col-sm-4">
                <input type="text" class="form-control form-control-sm @error('companyNr')is-invalid @enderror"
                    id="companyNr" wire:model.defer="companyNr">
                @error('companyNr')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
            <label for="taxNr" class="col-sm-2 col-form-label">BTW-nummer</label>
            <div class="col-sm-4">
                <input type="text" class="form-control form-control-sm @error('taxNr')is-invalid @enderror"
                    id="taxNr" wire:model.defer="taxNr">
                @error('taxNr')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <h4 class="text-primary">Contact gegevens</h4>
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
        <div class="mb-3 row">
            <label for="phone" class="col-sm-2 col-form-label">Telefoon 1</label>
            <div class="col-sm-4">
                <input type="text" class="form-control form-control-sm @error('phone')is-invalid @enderror"
                    id="phone" wire:model.defer="phone">
                @error('phone')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
            <label for="phone2" class="col-sm-2 col-form-label">Telefoon 2</label>
            <div class="col-sm-4">
                <input type="text" class="form-control form-control-sm @error('phone2')is-invalid @enderror"
                    id="phone2" wire:model.defer="phone2">
                @error('phone2')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <h4 class="text-primary">Adres gegevens</h4>
        <div class="mb-3 row">
            <label for="address" class="col-sm-2 col-form-label">Straat</label>
            <div class="col-sm-4">
                <input type="text" class="form-control form-control-sm @error('address')is-invalid @enderror"
                    id="address" wire:model.defer="address">
                @error('address')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
            <label for="housenumber" class="col-sm-2 col-form-label">Huisnr</label>
            <div class="col-sm-2">
                <input type="text" class="form-control form-control-sm @error('housenumber')is-invalid @enderror"
                    id="housenumber" wire:model.defer="housenumber">
                @error('housenumber')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-sm-2">
                <input type="text"
                    class="form-control form-control-sm @error('addressSuffix')is-invalid @enderror"
                    id="addressSuffix" wire:model.defer="addressSuffix" placeholder="Toevoeging">
                @error('addressSuffix')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="mb-3 row">
            <label for="zipcode" class="col-sm-2 col-form-label">Postcode</label>
            <div class="col-sm-4">
                <input type="text" class="form-control form-control-sm @error('zipcode')is-invalid @enderror"
                    id="zipcode" wire:model.defer="zipcode">
                @error('zipcode')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
            <label for="city" class="col-sm-2 col-form-label">Woonplaats</label>
            <div class="col-sm-4">
                <input type="text" class="form-control form-control-sm @error('city')is-invalid @enderror"
                    id="city" wire:model.defer="city">
                @error('city')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="mb-3 row">
            <label for="country" class="col-sm-2 col-form-label">Land</label>
            <div class="col-sm-4">
                <input type="text" class="form-control form-control-sm @error('country')is-invalid @enderror"
                    id="country" wire:model.defer="country">
                @error('country')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
            <label for="state" class="col-sm-2 col-form-label">Provincie</label>
            <div class="col-sm-4">
                <input type="text" class="form-control form-control-sm @error('state')is-invalid @enderror"
                    id="state" wire:model.defer="state">
                @error('state')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <h4 class="text-primary">Overige gegevens</h4>
        <div class="mb-3 row">
            <label for="birthdate" class="col-sm-2 col-form-label">Geboortedatum</label>
            <div class="col-sm-4">
                <input type="date" class="form-control form-control-sm @error('birthdate')is-invalid @enderror"
                    id="birthdate" wire:model.defer="birthdate">
                @error('birthdate')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
            <label for="birthcity" class="col-sm-2 col-form-label">Geboorteplaats</label>
            <div class="col-sm-4">
                <input type="text" class="form-control form-control-sm @error('birthcity')is-invalid @enderror"
                    id="birthcity" wire:model.defer="birthcity">
                @error('birthcity')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="mb-3 row">
            <label for="bsn" class="col-sm-2 col-form-label">BSN-nummer</label>
            <div class="col-sm-4">
                <input type="text" class="form-control form-control-sm @error('bsn')is-invalid @enderror"
                    id="bsn" wire:model.defer="bsn">
                @error('bsn')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
            <label for="iban" class="col-sm-2 col-form-label">IBAN-nummer</label>
            <div class="col-sm-4">
                <input type="text" class="form-control form-control-sm @error('iban')is-invalid @enderror"
                    id="iban" wire:model.defer="iban">
                @error('iban')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="mb-3 row">
            <label for="maritalStatus" class="col-sm-2 col-form-label">Burgerlijke staat</label>
            <div class="col-sm-4">
                <input type="text" class="form-control form-control-sm @error('maritalStatus')is-invalid @enderror"
                    id="maritalStatus" wire:model.defer="maritalStatus">
                @error('maritalStatus')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
            <label for="" class="col-sm-2 col-form-label"></label>
            <div class="col-sm-4">
            </div>
        </div>
        <div class="mb-3 row">
            <div class="col-sm-12">
                {{-- @include('includes.form_error') --}}
                <input class="btn btn-primary" type="submit" value="Opslaan" wire:loading.class="btn-secondary"
                    wire:loading.attr="disabled" />
            </div>
        </div>
    </form>
</div>
