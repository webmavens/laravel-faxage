<?php

namespace Webmavens\LaravelFaxage;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Webmavens\LaravelFaxage\Commands\LaravelFaxageCommand;

class LaravelFaxageServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('laravel-faxage')
            ->hasConfigFile();
    }
}
