<?php

use Manta\LaravelUsers\Http\Livewire\Users\UsersCreate;
use Manta\LaravelUsers\Http\Livewire\Users\UsersList;
use Manta\LaravelUsers\Http\Livewire\Users\UsersUpdate;
use Illuminate\Support\Facades\Route;


Route::get('/gebruikers', UsersList::class)->name('manta.users.list');
Route::get('/gebruikers/toevoegen', UsersCreate::class)->name('manta.users.create');
Route::get('/gebruikers/aanpassen/{input}', UsersUpdate::class)->name('manta.users.update');
