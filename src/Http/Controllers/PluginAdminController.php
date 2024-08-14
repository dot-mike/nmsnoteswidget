<?php

namespace DotMike\NmsNotesWidget\Http\Controllers;

use Illuminate\Routing\Controller;

use Gate;

class PluginAdminController extends Controller
{

    // show plugin main page
    // GET /plugins/nmsnoteswidget
    public function index()
    {
        Gate::authorize('admin');

        return view('nmsnoteswidget::main');
    }
}
