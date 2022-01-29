<?php

namespace Webmavens\LaravelFaxage;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Webmavens\LaravelFaxage\Commands\LaravelFaxageCommand;

class LaravelFaxageServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-faxage')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_laravel-faxage_table')
            ->hasCommand(LaravelFaxageCommand::class);
    }
}
