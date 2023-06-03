Route::get('/register', function () {
return abort(404);
});

Route::group(['prefix' => config('manta-cms.prefix'), 'middleware' => config('manta-cms.middleware')], function () {
Route::get('/dashboard', App\Http\Livewire\Cms\CmsGeneral::class)->name('manta.cms.general');
Route::get('/algemene-instellingen', App\Http\Livewire\Cms\CmsGeneral::class)->name('manta.cms.general');

Route::get('/gebruikers', App\Http\Livewire\Users\UsersList::class)->name('manta.users.list');
Route::get('/gebruikers/toevoegen', App\Http\Livewire\Users\UsersCreate::class)->name('manta.users.create');
Route::get('/gebruikers/aanpassen/{input}', App\Http\Livewire\Users\UsersUpdate::class)->name('manta.users.update');
});

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
\UniSharp\LaravelFilemanager\Lfm::routes();
});

Route::get('/logout', function () {
Illuminate\Support\Facades\Auth::logout();
return redirect('login');
})->name('logout');

Route::get('/clearDgP', function () {
Illuminate\Support\Facades\Artisan::call('cache:clear');
Illuminate\Support\Facades\Artisan::call('route:clear');
Illuminate\Support\Facades\Artisan::call('config:clear');
Illuminate\Support\Facades\Artisan::call('storage:link', []);
});