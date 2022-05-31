<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SignInController extends Controller
{
    public function signUp(Request $request){
        $request->validate([
            'nama' => 'required|min:3',
            'email' => 'required|email',
            'password' => 'required|min:6',
            'phone'=>'required|min:11',
        ]);

        $data = [
            'name' => $request->nama,
            'email' => $request->email,
            'phone'=>$request->phone,
            'password' => bcrypt($request->password),
            'remember_token' => $request->_token,
        ];
        User::create($data);

        return redirect()->route('home')->with('success',$data['name']. " berhasil terdaftar silahkan Login ");
    }

    public function signIn(Request $request){
        if(auth()->attempt($request->only('email', 'password'))){
            return redirect()->route('home');
        }else{
            return redirect()->route('home')->with('error_login', 'Email atau Password salah');
        }
    }

    public function signOut(){
        Auth::logout();
        return redirect()->route('home')->with('success', 'Anda logout');
    }
}
