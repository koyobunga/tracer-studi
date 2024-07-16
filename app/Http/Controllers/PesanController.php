<?php

namespace App\Http\Controllers;

use App\Models\Pesan;
use App\Http\Requests\StorePesanRequest;
use App\Http\Requests\UpdatePesanRequest;
use App\Models\Alumni;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PesanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data = [];
        $buka = [];
        if($request->id){
            $data = Pesan::where('penerima', $request->id)->orWhere('pengirim', $request->id)->get();
            $buka = Alumni::where('id', $request->id)->first();
        }
        $user = Alumni::all();
        return view('admin.pesan.index', [
            'title' => "Pesan",
            'data' => $data,
            'user' => $user,
            'buka' => $buka,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $valid = $request->validate([
            'ket' => 'required',
            'penerima' => 'required'
        ]);

        $valid['pengirim'] = 0;

        if(Pesan::create($valid))
            return back()->with('success', 'Pesan terkirim');
        return back()->with('error', 'Gagal mengirim pesan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pesan $pesan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pesan $pesan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePesanRequest $request, Pesan $pesan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pesan $pesan)
    {
        //
    }
}
