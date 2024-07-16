<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(Request $request){
        $data = Alumni::all();
        if($request->tahun){
            $data = Alumni::whereYear('selesai', $request->tahun)->get();
            $tahun = $request->tahun;
        }
        

        return view('admin.index', [
            'title' => 'Laporan', 
            'data' => $data,
        ]);

    }

    public function laporan(Request $request){
        $data = Alumni::all();
        if($request){
            if($request->tahun){
                $data = Alumni::whereYear('selesai', $request->tahun)->get();
                if($request->status)
                    $data = Alumni::whereYear('selesai', $request->tahun)
                    ->where('status', $request->status)->get();
            }else{
                if($request->status)
                    $data = $data->where('status', '=', $request->status);        
            }
        }
        

        return view('admin.laporan.index', [
            'title' => 'Laporan', 
            'data' => $data
        ]);

    }
    
    public function laporan_print(Request $request){
        $data = Alumni::all();
        if($request){
            if($request->tahun){
                $data = Alumni::whereYear('selesai', $request->tahun)->get();
                if($request->status)
                    $data = Alumni::whereYear('selesai', $request->tahun)
                    ->where('status', $request->status)->get();
            }else{
                if($request->status)
                    $data = $data->where('status', '=', $request->status);        
            }
        }

        return view('admin.laporan.print', [
            'title' => 'Laporan', 
            'data' => $data
        ]);

    }
}
