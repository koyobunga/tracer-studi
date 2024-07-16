<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AlumniController extends Controller
{
    public function index()
    {
        $data = Alumni::orderbydesc('id')->paginate(10)->withQueryString();

        return view('admin.alumni.index', [
            'title' => 'Data Alumni',
            'alumni' => $data,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.alumni.create', [
            'title' => 'Tambah Alumni'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $valid = $request->validate([
            'nis' => 'required|unique:alumnis',
            'nama' => 'required',
            'alamat' => 'nullable',
            'kontak' => 'nullable',
            'kelamin' => 'required',
            'jurusan' => 'required',
            'masuk' => 'required|date',
            'selesai' => 'required|date',
        ]);

        if(Alumni::create($valid)){
            $a = Alumni::where('nis', $request->nis)->first();
            $user = [
                'alumni_id' => $a->id,
                'name' => $request->nama,
                'username' => $request->nis,
                'level' => 'alumni',
                'email' => $request->nis.'@gmail.com',
                'password' => Hash::make($request->nis),
            ];
            User::create($user);
            return redirect('admin/alumni')->with('success','Baerhasil menyimpan ');
        }
        return back()->with('error','Gagal menyimpan ');

    }

    /**
     * Display the specified resource.
     */
    public function show(Alumni $alumnus)
    {
        dd($alumnus);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Alumni $alumnus)
    {

        return view('admin.alumni.edit', [
            'title' => 'Edit Alumni',
            'data' => $alumnus
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Alumni $alumnus)
    {
        $valid = $request->validate([
            'nis' => 'required',
            'nama' => 'required',
            'alamat' => 'nullable',
            'kontak' => 'nullable',
            'kelamin' => 'required',
            'jurusan' => 'required',
            'masuk' => 'required|date',
            'selesai' => 'required|date',
        ]);

        if($request->foto){
            $nama_foto = time().'.'.$request->foto->extension();
            $valid['foto'] = $nama_foto;
            $request->foto->move(public_path('img/alumni'), $nama_foto);
        }

        if(Alumni::find($alumnus->id)->update($valid)){
            if($request->nis != $alumnus->nis){
                $up = [
                    'username' => $request->nis,
                    'password' => Hash::make($request->nis)
                ];
                User::where('alumni_id', $alumnus->id)->update($up);
            }
            return redirect('admin/alumni')->with('success','Baerhasil menyimpan ');
        }
        return back()->with('error','Gagal menyimpan ');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Alumni $alumnus)
    {
        if(Alumni::destroy($alumnus->id)){
            User::where('username', $alumnus->nis)->delete();
            if(file_exists(public_path('img/alumni/'.$alumnus->foto))){
               unlink(public_path('img/alumni/'.$alumnus->foto));
            }
            return back()->with('error', 'Data telah dihapus');
        }
        return back()->with('error', 'Gagal hapus');
    }}
