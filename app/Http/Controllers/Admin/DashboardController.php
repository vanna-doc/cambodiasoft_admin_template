<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:dashboard-view', ['only' => ['dashboard']]);
    }
    function dashboard(Request $request) {
        return view('admin.pages.dashboard');
    }
}
