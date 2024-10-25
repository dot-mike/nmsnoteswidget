<?php

namespace DotMike\NmsNotesWidget\Hooks;

use App\Plugins\Hooks\MenuEntryHook;

class MenuHook extends MenuEntryHook
{
    public string $view = 'nmsnoteswidget::menu.main';
}
