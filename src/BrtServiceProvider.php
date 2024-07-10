<?php

namespace SmartDato\Brt;

use SmartDato\Brt\Commands\BrtCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class BrtServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('brt')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_brt_table')
            ->hasCommand(BrtCommand::class);
    }
}
