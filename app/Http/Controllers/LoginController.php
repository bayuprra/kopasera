<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login()
    {
        return view('layout/login');
    }

    public function authentikasi(Request $request)
    {

        $cred = $request->validate([
            'username'     => 'required',
            'password'  => 'required'
        ]);
        $user = $this->akunModel::where('username', $cred['username'])->first();
        if ($user && password_verify($cred['password'], $user->password)) {
            if (Auth::attempt($cred)) {
                $dataAkun = $this->akunModel->getAdminLoginData($user->id);
                // if ($user->role_id != 1) {
                //     $dataAkun = $this->akunModel->getCustomerLoginData($user->id);
                // }
                $request->session()->put('data', $dataAkun);
                $request->session()->regenerate();
                return redirect()->intended('/dashboard');
            }
        }
        return back()->with('error', 'username atau Password Salah');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        $request->session()->flash('success', 'Anda Telah Logout');
        return redirect('/');
    }
}
