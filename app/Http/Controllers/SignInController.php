<?php

namespace App\Http\Controllers;

use App\Models\Foto;
use App\Models\like;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class SignInController extends Controller
{
    public function signUp(Request $request)
    {
        $request->validate(
            [
                'nama' => 'required|min:3',
                'email' => 'required|email|unique:users,email',
                'username' => ['required', 'min:3', 'unique:users,username'],
                'password' => 'required|min:6',
            ],
            [
                'nama.required' => 'Nama tidak boleh kosong.',
                'nama.min' => 'Nama minimal 3 karakter.',
                'email.required' => 'Email tidak boleh kosong.',
                'email.email' => 'Email tidak valid.',
                'email.unique' => 'Email sudah digunakan.',
                'username.required' => 'Username tidak boleh kosong.',
                'username.min' => 'Username minimal 3 karakter.',
                'username.unique' => 'Username sudah digunakan.',
                'password.required' => 'Password tidak boleh kosong.',
                'password.min' => 'Password minimal 6 karakter.',
            ]
        );
        $data = [
            'name' => $request->nama,
            'email' => $request->email,
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'remember_token' => $request->_token,
        ];
        User::create($data);

        return redirect()->route('home')->with('success', $data['name'] . " berhasil terdaftar silahkan Login ");
    }

    public function signIn(Request $request)
    {
        if (auth()->attempt($request->only('email', 'password'))) {
            return redirect()->route('home');
        } else {
            return redirect()->route('home')->with('error_login', 'Email atau Password salah');
        }
    }

    public function signOut()
    {
        Auth::logout();
        return redirect()->route('home')->with('success', 'Anda logout');
    }

    public function profile(Request $request)
    {
        $user = User::find(Auth::user()->id);
        $data =
            [
                'title' => 'Profile',
                'form_type' => 'create',
                'search_route'=>'profile',
                'search' => '',
                'postcount'=>Foto::where('user_id',Auth::user()->id)->count(),
                'foto_download'=> 0,
                'foto_like'=> like::where('user_id',Auth::user()->id)->count(),
            ];
        $foto = Foto::where('user_id',Auth::user()->id)->get();
        foreach ($foto as $key) {
            $data['foto_download'] = $data['foto_download'] + $key->hit;
        }
        if (Auth::check()) {
            if ($request->search) {
                $data['search'] = $request->search;
                $foto = Foto::where('user_id', Auth::user()->id)->where('judul', 'LIKE', '%' . $request->search . '%')->get();
            } else {
                $foto = Foto::where('user_id', Auth::user()->id)->get();
            }

            return view('Auth.profile', compact('data', 'foto', 'user'));
        } else {
            return view('Auth.profile', compact('data'));
        }
    }

    public function setting()
    {
        $user = User::find(Auth::user()->id);
        $data = [
            'title' => 'setting',
        ];
        return view('Auth.setting', compact('user', 'data'));
    }

    public function uploadPicture(Request $request)
    {
        $user = User::find(Auth::user()->id);
        $file = $request->file('avatar');
        $new_image_name = Auth::user()->name . '_avatar' . '.jpg';
        if (Storage::exists('public/assets/avatar/' . $user->userpicture)) {
            Storage::delete('public/assets/avatar/' . $user->userpicture);
        }
        $upload = $file->storeAs('public/assets/avatar/', $new_image_name);
        $user->update(['userpicture' => $new_image_name]);
        if ($upload) {
            return response()->json(['status' => 1, 'msg' => 'Image has been cropped successfully.', 'name' => $new_image_name]);
        } else {
            return response()->json(['status' => 0, 'msg' => 'Something went wrong, try again later']);
        }
    }

    public function BioUpdate(Request $request)
    {
        $user = User::find(Auth::user()->id);
        $user->update(['bio' => $request->bio]);
        return redirect()->route('setting')->with('success', 'Bio berhasil diperbarui');
    }

    public function UpdateUser(Request $request)
    {
        // dd($request->all());
        $user = User::find(Auth::user()->id);
        $data = [
            'name'=>$request->nama,
            'email'=>$request->email,
            'username'=>$request->username,
        ];
        $user->update($data);
        return redirect()->route('profile')->with('success', 'Profile berhasil diperbaharui');
    }

    public function UpdatePassword(Request $request)
    {
        $user = User::find(Auth::user()->id);
        if (!password_verify($request->passwordLama, $user->password)) {
            return redirect()->route('setting')->with('error', 'Password lama salah, password gagal diperbaharui');
        }else{
            $user->update(['password' => bcrypt($request->passwordBaru)]);
            return redirect()->route('setting')->with('success', 'Password berhasil diperbaharui');
        }
    }
}
