<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu;

class MenueController extends Controller
{

    public function getMenu() {
        $results = Menu::where('is_active',1)->get();

        return view('admin.layouts.sidebar.getsidebar');
    }
}
