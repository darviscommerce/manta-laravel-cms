<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-100">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', config('app.name', 'Laravel'))</title>
    <meta name="description" content="">
    <meta name="author" content="Arvid de Jong | Manta">
    <meta name="generator" content="Manta by Manta">
    <link href="/images/manta/favicon.png" rel="shortcut icon" type="image/x-icon">
    <link href="/images/manta/webclip.png" rel="apple-touch-icon">
    <link href="/libs/fontawesome-free-6.3.0-web/css/all.css" rel="stylesheet">
    <link href="/libs/flag-icons/css/flag-icons.min.css" rel="stylesheet">
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="/libs/tinymce_6.3.1/js/tinymce/tinymce.min.js"></script>

    <script src="/libs/cropperjs/cropperjs.js"></script>
    <link rel="stylesheet" href="/libs/cropperjs/cropperjs.css">
    <script src="/libs/fancybox4/fancybox.js"></script>
    <link rel="stylesheet" href="/libs/fancybox4/fancybox.css">

    <link href="/css/manta.css" rel="stylesheet">
    @livewireStyles
</head>

<body class="d-flex flex-column h-100">
    @livewire('cms.cms-navigation')
    <!-- Begin page content -->
    <main class="flex-shrink-0 pt-4">
        {{ $slot }}
    </main>
    <footer class="py-3 mt-auto footer bg-light">
        <div class="container">
            <span class="text-muted">Manta {{ date('Y') }}</span>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"
        integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.min.js"
        integrity="sha256-eTyxS0rkjpLEo16uXTS0uVCS4815lc40K2iVpWDvdSY=" crossorigin="anonymous"></script>
    @stack('modals')
    @livewireScripts
    @stack('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            $(function() {
                $('[data-bs-toggle="tooltip"]').tooltip()
            })

            Livewire.hook('message.processed', (message, component) => {
                $(function() {
                    $('[data-bs-toggle="tooltip"]').tooltip()
                })
            })
        });
    </script>
</body>

</html>
