<?php

namespace DotMike\NmsNotesWidget\Providers;


use DotMike\NmsNotesWidget\Hooks\MenuEntry;
use DotMike\NmsNotesWidget\Hooks\DeviceOverview;

use LibreNMS\Interfaces\Plugins\PluginManagerInterface;
use LibreNMS\Interfaces\Plugins\Hooks\MenuEntryHook;
use LibreNMS\Interfaces\Plugins\Hooks\DeviceOverviewHook;

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
    public function boot(PluginManagerInterface $pluginManager): void
    {
        $pluginName = 'nmsnoteswidget';
        $pluginManager->publishHook($pluginName, MenuEntryHook::class, MenuEntry::class);
        $pluginManager->publishHook($pluginName, DeviceOverviewHook::class, DeviceOverview::class);

        // if plugin is disabled, don't boot it
        if (! $pluginManager->pluginEnabled($pluginName)) {
            return;
        }

        $this->loadRoutesFrom(__DIR__ . '/../../routes/web.php');
        $this->loadViewsFrom(__DIR__ . '/../../resources/views', $pluginName);
        $this->loadTranslationsFrom(__DIR__ . '/../../resources/lang', $pluginName);
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
