<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Users\UsersCreate;
use App\Http\Livewire\Users\UsersList;
use App\Http\Livewire\Users\UsersUpdate;
use App\Http\Livewire\Cms\CmsGeneral;

Route::get('/algemene-instellingen', CmsGeneral::class)->name('manta.cms.general');

Route::get('/gebruikers', UsersList::class)->name('manta.users.list');
Route::get('/gebruikers/toevoegen', UsersCreate::class)->name('manta.users.create');
Route::get('/gebruikers/aanpassen/{input}', UsersUpdate::class)->name('manta.users.update');
