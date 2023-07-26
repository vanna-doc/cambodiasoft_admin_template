<?php

namespace App\Http\Controllers\Lang;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
class SwitchLanguageController extends Controller
{
    public function SetLang($locale)  {
        App::setLocale($locale);
        session::put("locale" ,$locale);
        return redirect()->back();
    }
}
