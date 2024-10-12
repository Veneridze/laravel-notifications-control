<?php
namespace Veneridze\NotificationsControl;


use Illuminate\Contracts\Foundation\Application;
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
            ->hasMigration('add_user_notification_preferences')
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
        $this->app->singleton(NotificationsControl::class, fn(Application $app) => new NotificationsControl(config('notifications-control.ways')));
    }
}
