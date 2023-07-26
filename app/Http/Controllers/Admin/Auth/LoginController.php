<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Contracts\Hashing\Hasher;
use Lang;
class LoginController extends Controller
{
    public function __construct(Hasher $hasher)
    {
        $this->hasher = $hasher;
    }
    function login()  {

        return view('admin.pages.auth.login');
    }


    public function onLogin(Request $request)
    {

        $request->validate([
            'username' => 'required',
            'password' => 'required|min:8|max:255|regex:/^[a-zA-Z0-9_\-]+$/',
        ]);


        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])){
            session()->put('auth.tbluser', Auth::user());
            return redirect()->route('admin-dashboard');


        }else{

            $message =  Lang::get('global.auth.login_fail');
            toast("$message",'error')->timerProgressBar()->width('300px');;
            return redirect()->route('admin-login');
        }




    }


    public function onLogOut() {
        Session::flush();
        Auth::logout();

        return redirect()->route('admin-login');
    }


}
