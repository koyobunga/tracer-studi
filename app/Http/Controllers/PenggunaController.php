<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use App\Models\Info;
use App\Models\Pesan;
use App\Models\Riwayat;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PenggunaController extends Controller
{
    public function index(Request $request){
        if($request->search){
            $data = Alumni::where('nis', 'like', '%'.$request->search.'%')
                ->orwhere('nama', 'like', '%'.$request->search.'%')->orderby('nama')->paginate(7)->withQueryString();
        }else{
            $data = Alumni::orderby('nama')->paginate(7)->withQueryString();
        }

        return view('alumni.index', [
            'title' => 'Dashboard',
            'data' => $data,
            'info' => Info::orderby('id', 'desc')->limit(7)->get(),
        ]);
    }

    public function pesan(){
        $id = Auth::user()->alumni->id;
        
        Pesan::where('penerima', $id)->update(['sts' => 1]);

        $data = Pesan::where('penerima', $id)->orWhere('pengirim', $id)->get();
        return view('alumni.pesan.index', [
            'title' => "Pesan",
            'data' => $data
        ]);
    }

    public function pesan_post(Request $request){
        $valid = $request->validate([
            'ket' => 'required'
        ]);
        $valid['pengirim'] = Auth::user()->alumni->id;
        $valid['penerima'] = 0;

        if(Pesan::create($valid))
            return back()->with('success', 'Pesan terkirim');
        return back()->with('error', 'Gagal mengirim pesan');
    }

    public function show(Alumni $alumni){
        return view('alumni.show.index', [
            'title' => "Info Alumni",
            'data' => $alumni
        ]);
    }
    
    public function profile(){
        return view('alumni.profile.index', [
            'title' => 'Profile Saya',
            'data' => Auth::user()->alumni,
            'riwayat' => Riwayat::where('alumni_id', Auth::user()->alumni_id)->orderbydesc('id')->get(),
        ]);
    }
  
    public function profile_post(Request $request){
        $valid = $request->validate([
            'nis' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'jurusan' => 'required',
            'masuk' => 'required|date',
            'selesai' => 'required|date',
            'kontak' => 'required',
            'status' => 'nullable',
        ]);

        $alumnus = Auth::user()->alumni;

        if(Alumni::find($alumnus->id)->update($valid)){

            return back()->with('success','Baerhasil menyimpan ');
        }
        return back()->with('error','Gagal menyimpan ');

    }
    public function profile_foto(Request $request){
        $valid = $request->validate([
            'foto' => 'required'
        ]);

        $nama_foto = time().'.'.$request->foto->extension();
        $valid['foto'] = $nama_foto;
        $request->foto->move(public_path('img/alumni'), $nama_foto);
        
        $alumnus = Auth::user()->alumni;
        if(Alumni::find($alumnus->id)->update(['foto' => $nama_foto]))
            return back()->with('success','Foto profile diperbarui.. ');
        return back()->with('error','Gagal perbarui foto ');
 
    }
}
