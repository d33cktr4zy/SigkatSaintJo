<?php

namespace stjo\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;

class SigkatAuthController extends Controller
{
 //
    public  function getLogin()
    {
        return view('form.loginForm');
    }

    public function postLogin()
    {
        $username = Request::input('username');
        $password = Request::input('password');

        if(Auth::attempt(['username' => $username, 'password' => $password]))
        {
            //dd('sukses');
            //timestamp the time login
            \stjo\Model\User::where('id',Auth::user()->id)->firstOrFail()->update(['kunjungan_terakhir' => \Carbon\Carbon::now()]);
            return redirect('user/profile');
        }
        else
        {
            return redirect('login')->withErrors(['errors' => 'Wrong Credential']);
        }
    }

    public function getLogout()
    {
        // buat nge logout user, then redirect to main page
       Auth::logout();

        return redirect('/');

    }


}
