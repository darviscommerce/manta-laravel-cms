
Route::group(['prefix' => config('manta-cms.prefix'), 'middleware' => config('manta-cms.middleware')], function () {
Route::get('/algemene-instellingen', App\Http\Livewire\Cms\CmsGeneral::class)->name('manta.cms.general');

Route::get('/gebruikers', App\Http\Livewire\Users\UsersList::class)->name('manta.users.list');
Route::get('/gebruikers/toevoegen', App\Http\Livewire\Users\UsersCreate::class)->name('manta.users.create');
Route::get('/gebruikers/aanpassen/{input}', App\Http\Livewire\Users\UsersUpdate::class)->name('manta.users.update');
});