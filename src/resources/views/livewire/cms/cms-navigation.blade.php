<nav class="navbar navbar-expand-lg" aria-label="Ninth navbar example" style="background-color: #e3f2fd;">
    <div class="container-xl">
        <a class="navbar-brand" href="{{ route('dashboard') }}">
            <img src="/images/manta/manta-logo.svg" alt="Manta" height="24">
        </a>
        <div class="collapse navbar-collapse" id="navbarsExample07XL">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                @if (Route::has('dashboard'))
                <li class="nav-item">
                    <a class="nav-link {{ $activeHome }}" aria-current="page" href="{{ route('dashboard') }}">Home</a>
                </li>
                @endif
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle {{ $activeModules }}" href="#" data-bs-toggle="dropdown" aria-expanded="false">Modules</a>
                    <ul class="dropdown-menu">
                        @if (Route::has('manta.users.list'))
                            <li><a class="dropdown-item {{ preg_match('/users/', $currentRouteName) ? 'active' : null }}" href="{{ route('manta.users.list') }}">Gebruikers</a></li>
                        @endif
                        @if (Route::has('manta.pages.list'))
                            <li><a class="dropdown-item {{ preg_match('/pages/', $currentRouteName) ? 'active' : null }}" href="{{ route('manta.pages.list') }}">Tekst pagina's</a></li>
                        @endif
                        @if (Route::has('manta.uploads.list'))
                            <li><a class="dropdown-item {{ preg_match('/uploads/', $currentRouteName) ? 'active' : null }}" href="{{ route('manta.uploads.list') }}">Uploads</a></li>
                        @endif
                    </ul>
                </li>
            </ul>
            <div id="intro" class="pull-right">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{ env('APP_URL') }}" target="_blank">Website</a>
                    </li>
                </ul>
              </div>
            {{-- <form role="search">
                <input class="form-control" type="search" placeholder="Search" aria-label="Search">
            </form> --}}
        </div>
    </div>
</nav>
