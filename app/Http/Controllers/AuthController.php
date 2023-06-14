<?php

namespace App\Http\Controllers;

use App\Models\AuthModel;
use Illuminate\Http\Request;


class AuthController extends Controller
{
    public function indexLogin() 
    {
        return view('v_login');
    }

    public function postLogin(Request $request) 
    {
        $credentials = $request->only('name', 'password');
        $user = AuthModel::where('name', $credentials['name'])->first();
        if (!$user || !password_verify($credentials['password'], $user->password)) {
            return redirect()->back()->with('pesan', 'Silahkan masukkan kembali username dan password anda');
        } else {
            return redirect('admin');
        }
    }


}
