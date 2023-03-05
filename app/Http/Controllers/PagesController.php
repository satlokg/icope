<?php

namespace App\Http\Controllers;

use App\Models\Module;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function who($module_id = NULL, $device = NULL) {
        $module = Module::where('id', $module_id)->first();
        return view('pages.who', compact('module','device'));
        
    }
}
