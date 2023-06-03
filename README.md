# CMS with Bootstrap 5.3 template and user management

Laravel Bootstrap manager

## Install a Laravel project

Install a Laravel project and copy/ paste this code in your terminal  
`composer create-project laravel/laravel example-app`

[Laravel installation guide](https://laravel.com/docs/10.x/installation)

## Laravel Jetstream and Livewire

Install Jetstream to get Livewire and user teams  
`composer require laravel/jetstream`

[Jetstream installation guide](https://jetstream.laravel.com/3.x/installation.html)

## Install this package

`composer require darvis/manta-laravel-cms`

Run the installation in your terminal  
`php artisan manta:install`

## Yeah all done

No you can use the system

---

# Additional information

## Livewire

We use Livewire so we can use PHP in the frontend to keep things simple
[Livewire guide](https://laravel-livewire.com/)

## Dashboard after login redirect

The dashboard url after login will be changed to /##prefix##/dashboard  
The default prefix is (manta), so this wil be /manta/dashboard

The location to set the default redirect is

> app\Providers\RouteServiceProvider.php

`public const HOME = '/manta/dashboard';`

## Change Dashboard page

In web.php you can change the dashboard controller.  
By default the dasboard page is leaded to settings.
