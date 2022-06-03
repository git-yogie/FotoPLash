<?php

namespace App\Http\Controllers;

use App\Models\Foto;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class FotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'title' => 'postingan',
            'form_type' => 'create',
        ];

        return view('post.form', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'judul' => 'required',
                'foto' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            ],
            ['judul.required' => 'Judul tidak boleh kosong.',
            'foto.required' => 'Foto tidak boleh kosong.',
            'foto.image' => 'Foto harus berupa gambar.',
            'foto.mimes' => 'Extensi yang diterima jpeg, png, dan jpg.',
            'foto.max' => 'Foto tidak boleh lebih dari 2MB.',
            ]
        );
        $fotoName = Str::random(20) . '.' . $request->file('foto')->getClientOriginalExtension();
        $data = [
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'foto' => $fotoName,
            'dimensi' => '',
            'ukuran' => '',
            'user_id' => Auth::user()->id,
        ];
        if ($request->hasFile('foto')) {
            $request->file('foto')->storeAs('public/assets/image/', $fotoName);
            if (Storage::exists('public/assets/image/' . $fotoName)) {
                $db = Foto::create($data);
                $size = getimagesize(Storage::path('public/assets/image/' . $fotoName));
                $db->dimensi = $size[0] . ' x ' . $size[1];
                $db->ukuran = filesize(Storage::path('public/assets/image/' . $fotoName));
                $db->save();
                return redirect()->route('postingan')->with('success', 'Foto berhasil di Upload');
            } else {
                return redirect()->route('fotoCreate')->with('error', 'Foto gagal di Upload');
            }
        } else {
            return redirect()->route('fotoCreate')->with('error', 'Foto gagal di Upload');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Foto  $foto
     * @return \Illuminate\Http\Response
     */
    public function show(Foto $foto, $id)
    {
        $foto = Foto::find($id);
        if (isset(Auth::user()->id)) {
            $title = Auth::user()->id == $foto->user_id ? 'postingan' : 'home';
        } else {
            $title = 'home';
        }
        $data = [
            'id' => $foto->id,
            'title' => $title,
            'judul' => $foto->judul,
            'deskripsi' => $foto->deskripsi,
            'foto' => $foto->foto,
            'dimensi' => $foto->dimensi,
            'ukuran' => round(intval($foto->ukuran) / 1024 / 1024, 4) . 'MB',
            'user_id' => $foto->user_id,
            'author' => User::find($foto->user_id)->name,
            'created' => $foto->created_at,
            'diff' => $foto->created_at->diffForHumans(),

        ];

        return view('post.detail', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Foto  $foto
     * @return \Illuminate\Http\Response
     */
    public function edit(Foto $foto, $id)
    {
        $foto = Foto::find($id);
        $data = [
            'title' => 'postingan',
            'form_type' => 'edit',
        ];
        return view('post.form', compact('data', 'foto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Foto  $foto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $foto = Foto::find($id);

        if (isset($request->foto)) {
            if ($request->hasFile('foto')) {
                if (Storage::exists('public/assets/image/' . $foto->foto)) {
                    Storage::delete('public/assets/image/' . $foto->foto);

                    $fotoName = Str::random(20) . '.' . $request->file('foto')->getClientOriginalExtension();
                    $data = [
                        'judul' => $request->judul,
                        'deskripsi' => $request->deskripsi,
                        'foto' => $fotoName,
                        'dimensi' => '',
                        'ukuran' => '',
                    ];
                    $request->file('foto')->storeAs('public/assets/image/', $fotoName);
                    $size = getimagesize(Storage::path('public/assets/image/' . $fotoName));
                    $data['dimensi'] =  $size[0] . ' x ' . $size[1];
                    $data['ukuran'] = filesize(Storage::path('public/assets/image/' . $fotoName));
                    if (Storage::exists('public/assets/image/' . $fotoName)) {
                        $db = $foto->update($data);
                        return redirect()->route('postingan')->with('success', 'Foto' . $request->judul . ' berhasil di Upload');
                    }
                }
            }
        } else {
            $foto->update($request->all());
            return redirect()->route('postingan')->with('success', 'Foto' . $request->judul . ' berhasil di Upload');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Foto  $foto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Foto $foto, $id)
    {
        $data = Foto::find($id);
        // dd(Storage::exists('public/assets/image/'.$data->foto));
        if (Storage::exists('public/assets/image/' . $data->foto)) {
            Storage::delete('public/assets/image/' . $data->foto);
        }

        $data->delete();
        return redirect()->route('postingan')->with('success', 'Foto berhasil di Hapus');
    }

    public function download($foto)
    {
        if (Storage::exists('public/assets/image/' . $foto)) {
            return Storage::download('public/assets/image/' . $foto);
        }
    }
}
