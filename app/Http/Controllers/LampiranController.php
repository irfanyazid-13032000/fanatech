<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LampiranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('lampiran.index');
    }

    public function peserta($no_surat)
    {
        $asesi_lampiran = DB::table('asesi_lampiran')
                    ->where('no_surat',$no_surat)
                    ->get();
        
        return view('lampiran.peserta',compact('no_surat','asesi_lampiran'));
    }

    public function pesertaHapus($no_surat,$id)
    {
        DB::table('asesi_lampiran')
            ->where('id', $id)
            ->where('no_surat',$no_surat)
            ->delete();

        return redirect()->route('lampiran.peserta',['no_surat'=>$no_surat]);
    }

    public function pesertaTambah(Request $request,$no_surat)
    {
        DB::table('asesi_lampiran')->insert([
            'no_surat'=>$no_surat,
            'nama_asesi' => $request->nama_asesi,
            'skema' => $request->skema,
            'jam' => $request->jam,
            'ruang' => $request->ruang,
            'asesor' => $request->asesor,
           ]);

           return redirect()->route('lampiran.peserta',['no_surat'=>$no_surat]);
    }

    public function export($no_surat)
    {
        $pesertaLampiran = DB::table('asesi_lampiran')
                            ->where('no_surat',$no_surat)
                            ->get();


        $lampiran = DB::table('lampiran')
                            ->where('no_surat',$no_surat)
                            ->get()
                            ->first();
    


        return view('lampiran.lampiran-surat-tugas-asesor',compact('pesertaLampiran','lampiran'));
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
        //
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
