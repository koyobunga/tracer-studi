<?php

namespace App\Http\Controllers;

use App\Models\Info;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InfoController extends Controller
{
    public function index(Request $request)
    {
        $search = '';
        if($request->search){
            $search = $request->search;
            $data = Info::where('label','like', '%'.$search.'%')->orderbydesc('id')->paginate(10)->withQueryString();
        }else{
            $data = Info::orderbydesc('id')->paginate(10)->withQueryString();
        }
        return view('admin.info.index', [
            'title' => 'Info',
            'info' => $data,
            'search' => $search

        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.info.create', [
            'title' => 'Tambah Info'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $valid = $request->validate([
            'label' => 'required',
            'ket' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $nama_image = time().'.'.$request->image->extension();
        $valid['slug'] = Str::slug($request->label);
        $valid['image'] = $nama_image;

        $request->image->move(public_path('img/info'), $nama_image);

        if(Info::create($valid))
            return redirect('admin/info')->with('success','Baerhasil menyimpan ');
        return back()->with('error','Gagal menyimpan ');

    }

    /**
     * Display the specified resource.
     */
    public function show(Info $info)
    {
        dd($info);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Info $info)
    {

        return view('admin.info.edit', [
            'title' => 'Edit Info',
            'data' => $info
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Info $info)
    {
        $valid = $request->validate([
            'label' => 'required',
            'ket' => 'required',
        ]);
        if($request->label != $info->label){
            $valid['slug'] = Str::slug($request->label);
        }
        if($request->image){
            $nama_image = time().'.'.$request->image->extension();
            $valid['image'] = $nama_image;
            $request->image->move(public_path('img/info'), $nama_image);
        }
            $valid['user_id'] = Auth::user()->id;
        if(Info::find($info->id)->update($valid))
            return redirect('admin/info')->with('success','Baerhasil menyimpan ');
        return back()->with('error','Gagal menyimpan ');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Info $info)
    {
        if(Info::destroy($info->id)){
            if(file_exists(public_path('img/info/'.$info->image))){
               unlink(public_path('img/info/'.$info->image));
           }
           return back()->with('error', 'Data telah dihapus');
        }
        return back()->with('error', 'Gagal hapus');
    }}
