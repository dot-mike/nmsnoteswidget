<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['web', 'auth'], 'guard' => 'auth'], function () {
    Route::namespace('DotMike\NmsNotesWidget\Http\Controllers')->group(function () {

        // named routes uses prefix plugin.nmsnoteswidget.
        Route::name('plugin.nmsnoteswidget.')->group(function () {

            // Admin routes
            Route::prefix('plugin/settings/nmsnoteswidget')->group(function () {
                Route::get('/', 'PluginAdminController@index')->name('index');
            });
        });
    });
});
