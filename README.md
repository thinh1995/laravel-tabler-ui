# Laravel Tabler UI
[![Tests](https://github.com/thinh1995/laravel-tabler-ui/actions/workflows/php.yml/badge.svg)](https://github.com/thinh1995/laravel-tabler-ui/actions/workflows/php.yml)
[![Test Coverage](https://github.com/thinh1995/laravel-tabler-ui/blob/master/badge-coverage.svg)](https://github.com/thinh1995/laravel-tabler-ui/blob/master/clover.xml)


## Documentation, Installation, and Usage Instructions
See the [documentation](https://laravel-tabler-ui.mollibox.com/) for detailed installation and usage instructions.

## What It Does
This package is a collection of super simple but elegant Laravel blade-based UI components using [Tabler](https://tabler.io/admin-template) and vanilla Javascript. 

## Requirements
Laravel Tabler UI components are purely Laravel blade components sprinkled with some Tabler sauce. This means you absolutely need to be using Laravel Tabler UI in a Laravel project. The package has the following dependencies:

- PHP >= 8.1
- Laravel >= 10.x

## Install
At the root of your Laravel project, type the following composer command in your terminal to pull in the package.

```bash
composer require lucifer293/laravel-tabler-ui
```

Next you need to publish the package's public assets by running the command below, still at the root of your Laravel project. This will create a `tabler` directory in your public directory.

```bash
php artisan vendor:publish --provider="Lucifer\LaravelTablerUi\LaravelTablerUiProvider" --force
```

## Updating
Running composer update at the root of your project will pull in the latest version of Laravel Tabler UI depending on how your dependencies are defined in composer.json.

```bash
composer update lucifer293/laravel-tabler-ui
```

It is important to republish the assets and config after every update to pull in any new css and js changes. Run the command below to publish the Laravel Tabler UI assets and config.

```bash
php artisan vendor:publish --provider="Lucifer\LaravelTablerUi\LaravelTablerUiProvider" --force
```