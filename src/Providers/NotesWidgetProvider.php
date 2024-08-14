<?php

namespace DotMike\NmsNotesWidget\Providers;


use DotMike\NmsNotesWidget\Hooks\MenuHook;
use DotMike\NmsNotesWidget\Hooks\DeviceHook;

use App\Plugins\Hooks\MenuEntryHook;
use App\Plugins\Hooks\DeviceOverviewHook;
use App\Plugins\PluginManager;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class NotesWidgetProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register(): void
    {
        $this->registerBindings();
    }

    /**
     * Boot the application events.
     *
     * @return void
     */
    public function boot(PluginManager $manager): void
    {
        $this->loadRoutesFrom(__DIR__ . '/../../routes/web.php');
        $this->loadViewsFrom(__DIR__ . '/../../resources/views', 'nmsnoteswidget');
        $this->loadTranslationsFrom(__DIR__ . '/../../resources/lang', 'nmsnoteswidget');

        $manager->publishHook('nmsnoteswidget', MenuEntryHook::class, MenuHook::class);
        $manager->publishHook('nmsnoteswidget', DeviceOverviewHook::class, DeviceHook::class);
    }

    protected function registerBindings(): void
    {

        View::composer('nmsnoteswidget::*', function ($view) {
            $view->with('nmsnoteswidget_version', $this->getVersion());
        });
    }

    protected function getVersion(): string
    {
        $composerFile = __DIR__ . '/../../composer.json';
        $composerData = json_decode(file_get_contents($composerFile), true);
        return $composerData['version'] ?? 'unknown';
    }
}
