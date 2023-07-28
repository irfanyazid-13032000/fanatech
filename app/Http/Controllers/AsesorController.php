<?php

namespace App\Http\Controllers;

use App\Models\Asesor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AsesorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        // return view('assessment.surat-tugas-asesor');
        return view('asesor.index');

    }

    public function anggota($no_surat)
    {
        $anggotas = DB::table('tugas_asesors')
                    ->where('no_surat_asesor',$no_surat)
                    ->get();
        // dd($anggotas);

        return view('asesor.anggota',compact('anggotas','no_surat'));
    }


    public function exportSurat($no_surat)
    {

        $asesor = Asesor::where('no_surat', $no_surat)->get()->first();

        $anggotas = DB::table('tugas_asesors')
                    ->where('no_surat_asesor',$no_surat)
                    ->get();

        // dd($asesor);


        

        // return view('asesor.surat-tugas-asesor',compact('asesor','anggotas')); 
        return view('asesor.surat-tugas-asesor',compact('asesor','anggotas')); 
    }

    public function tambahAnggota(Request $request,$no_surat)
    {

       DB::table('tugas_asesors')->insert([
        'no_surat_asesor'=>$no_surat,
        'nama' => $request->name,
        'jabatan' => $request->jabatan,
        'reg_met' => $request->reg_met,
       ]);

       return redirect()->route('anggota.asesor',['no_surat'=>$no_surat]);
    }


    public function hapusAnggota($id,$no_surat)
    {
        
        DB::table('tugas_asesors')->where('id', $id)->delete();

        return redirect()->route('anggota.asesor',['no_surat'=>$no_surat]);

    }

  

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('asesor.tambah-asesor');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::table('asesors')->insert([
            'no_surat' => $request->no_surat,
            'tempat' => $request->tempat,
            'alamat' => $request->alamat,
            'jumlah_asesi' => $request->jumlah_asesi,
            'tanggal' => $request->tanggal,
        ]);

        return redirect()->route('asesor.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
