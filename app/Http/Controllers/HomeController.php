<?php

namespace App\Http\Controllers;

use App\Models\Foto;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(Request $request)
    {
    
        $data =
            [
                'title' => 'home',
                'search' => '',
            ];
            if($request->search){
                $data['search'] = $request->search;
                $foto = Foto::where('judul', 'LIKE', '%'.$request->search.'%')->get();
            }else{
                $foto = Foto::all();
            }

        return view('home.index', compact('data'), compact('foto'));
    }

    public function postingan(Request $request)
    {   

        $data =
            [
                'title' => 'postingan',
                'form_type' => 'create',
                'search' => '',
            ];
        if(Auth::check()){
            if($request->search){
                $data['search'] = $request->search;
                $foto = Foto::where('user_id',Auth::user()->id)->where('judul', 'LIKE', '%'.$request->search.'%')->get();
            }else{
                $foto = Foto::where('user_id', Auth::user()->id)->get();
            }
           
            return view('home.postingan', compact('data'),compact('foto'));
        }else{
            return view('home.postingan', compact('data'));
        }
    }
}
