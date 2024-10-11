<?php
namespace Veneridze\NotificationsControl;


use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Spatie\LaravelPackageTools\Commands\InstallCommand;

class NotificationsControlProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('laravel-notifications-control')
            ->hasConfigFile()
            ->publishesServiceProvider('NotificationsControlProvider')
            ->hasInstallCommand(function(InstallCommand $command) {
                $command
                    ->publishConfigFile()
                    ->publishMigrations()
                    ->copyAndRegisterServiceProviderInApp();
            });
    }

    public function packageBooted(): void
    {
        //$mediaClass = config('media-library.media_model', Media::class);

        //$mediaClass::observe(new MediaObserver);
    }

    public function packageRegistered(): void
    {
        //$this->app->bind(WidthCalculator::class, config('media-library.responsive_images.width_calculator'));
        //$this->app->bind(TinyPlaceholderGenerator::class, config('media-library.responsive_images.tiny_placeholder_generator'));
//
        //$this->app->scoped(MediaRepository::class, function () {
        //    $mediaClass = config('media-library.media_model');
//
        //    return new MediaRepository(new $mediaClass);
        //});
    }
}
