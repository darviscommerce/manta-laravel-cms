@section('module', 'general')
@section('title', 'Algemene gegevens')
<div class="container">
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Algemene gegevens</li>
        </ol>
    </nav>
    <form wire:submit.prevent="store(Object.fromEntries(new FormData($event.target)))">
        <div class="mb-3 row">
            <label for="company" class="col-sm-3 col-form-label">Bedrijfsnaam</label>
            <div class="col-sm-4">
                <input type="text" class="form-control form-control-sm @error('company')is-invalid @enderror"
                    id="company" wire:model.defer="company">
                @error('company')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-sm-5"></div>
        </div>
        <div class="mb-3 row">
            <label for="address" class="col-sm-3 col-form-label">Adres</label>
            <div class="col-sm-4">
                <input type="text" class="form-control form-control-sm @error('address')is-invalid @enderror"
                    id="address" wire:model.defer="address">
                @error('address')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-sm-5"></div>
        </div>
        <div class="mb-3 row">
            <label for="zipcode" class="col-sm-3 col-form-label">Postcode</label>
            <div class="col-sm-4">
                <input type="text" class="form-control form-control-sm @error('zipcode')is-invalid @enderror"
                    id="zipcode" wire:model.defer="zipcode">
                @error('zipcode')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-sm-5"></div>
        </div>
        <div class="mb-3 row">
            <label for="city" class="col-sm-3 col-form-label">Woonplaats</label>
            <div class="col-sm-4">
                <input type="text" class="form-control form-control-sm @error('city')is-invalid @enderror"
                    id="city" wire:model.defer="city">
                @error('city')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-sm-5"></div>
        </div>
        <div class="mb-3 row">
            <label for="phone" class="col-sm-3 col-form-label">Telefoonnummer voor weergave</label>
            <div class="col-sm-4">
                <input type="phone" class="form-control form-control-sm @error('phone')is-invalid @enderror" placeholder="Bijvoorbeeld: +316123456789"
                    id="phone" wire:model.defer="phone">
                @error('phone')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-sm-5"></div>
        </div>
        <div class="mb-3 row">
            <label for="phone_input" class="col-sm-3 col-form-label">Telefoonnummer voor link</label>
            <div class="col-sm-4">
                <input type="phone_input" class="form-control form-control-sm @error('phone_input')is-invalid @enderror" placeholder="Bijvoorbeeld: +316123456789"
                    id="phone_input" wire:model.defer="phone_input">
                @error('phone_input')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-sm-5"></div>
        </div>
        <div class="mb-3 row">
            <label for="email" class="col-sm-3 col-form-label">E-mail</label>
            <div class="col-sm-4">
                <input type="email" class="form-control form-control-sm @error('email')is-invalid @enderror"
                    id="email" wire:model.defer="email">
                @error('email')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-sm-5"></div>
        </div>
        <div class="mb-3 row d-none">
            <label for="facebook" class="col-sm-3 col-form-label">Facebook</label>
            <div class="col-sm-4">
                <input type="text" class="form-control form-control-sm @error('facebook')is-invalid @enderror"
                    id="facebook" wire:model.defer="facebook">
                @error('facebook')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-sm-5"></div>
        </div>
        <div class="mb-3 row d-none">
            <label for="instagram" class="col-sm-3 col-form-label">Instagram</label>
            <div class="col-sm-4">
                <input type="text" class="form-control form-control-sm @error('instagram')is-invalid @enderror"
                    id="instagram" wire:model.defer="instagram">
                @error('instagram')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-sm-5"></div>
        </div>
        <div class="mb-3 row d-none">
            <label for="twitter" class="col-sm-3 col-form-label">Twitter</label>
            <div class="col-sm-4">
                <input type="text" class="form-control form-control-sm @error('twitter')is-invalid @enderror"
                    id="twitter" wire:model.defer="twitter">
                @error('twitter')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-sm-5"></div>
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
