<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('login.login');
    }


    public function auth(Request $request){

        // dd($request->all());
        $request->validate([
                'email' => 'required|exists:users,email',
                'password' => 'required',
            ],
            [
                //costom massage
                'email.exists' => 'usersame ini belum tersedia',
                'email.required' => 'username harus diisi',
                'password.required' => 'password harus diisi'
            ],
         );

         $user = $request->only('email', 'password');

         if(Auth::attempt($user)){
            return redirect()->route('dashboard');
         }else{
            return redirect()->back()->with('error', "gagal login, silahkan cek dan coba lagi!");
         }

    }

    public function logout(){
        Auth::logout();
        return redirect('/login');
    }

    
}
