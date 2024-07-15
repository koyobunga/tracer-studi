<?php

namespace App\Http\Controllers;

use App\Models\Bidang;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        return view('admin.user.index', [
            'title' => "Data User",
            'data' => User::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.user.create', [
            'title' => 'Tambah user',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $valid = $request->validate([
            'bidang_id' => 'nullable',
            'name' => 'required',
            'username' => 'required|unique:users',
            'level' => 'required',
            'password' => 'required',
            'email' => 'required',
        ]);

        $valid['password'] = Hash::make($request->password);

        if(User::create($valid))
            return redirect('admin/users')->with('success' ,'User ditambahkan..');
        return back()->with('error' ,'Gagal menambahkan..');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('admin.user.edit', [
            'title' => 'Edit User',
            'data' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $valid = $request->validate([
            'bidang_id' => 'nullable',
            'name' => 'required',
            'username' => 'required',
            'level' => 'required',
            'email' => 'required',
        ]);

        if(!empty($request->password))
            $valid['password'] = Hash::make($request->password);

        if(User::find($user->id)->update($valid))
            return redirect('admin/users')->with('success' ,'User diperbarui..');
        return back()->with('error' ,'Gagal perbarui user..');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $id)
    {
        if(User::destroy($id))
            return back()->with('info', 'Data  User dihapus..');
            return back()->with('error', 'Gagal menghapus data..');
    }
}
