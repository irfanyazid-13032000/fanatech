<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BeritaAcaraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('berita-acara.index');
    }

    public function export($no_surat)
    {
        $beritaAcara = DB::table('berita_acara')
                    ->where('no_surat',$no_surat)
                    ->get()
                    ->first();

        $pesertaTes = DB::table('peserta_tes_kompetensi')
                    ->where('no_surat',$no_surat)
                    ->get();

        // dd($pesertaTes);
        
        return view('berita-acara.berita-acara-asesor',compact('beritaAcara','pesertaTes'));
    }

    public function peserta($no_surat)
    {
        $pesertaTes = DB::table('peserta_tes_kompetensi')
                        ->where('no_surat',$no_surat)
                        ->get();
        return view('berita-acara.peserta',compact('no_surat','pesertaTes'));
    }

    public function tambahPeserta(Request $request,$no_surat)
    {
        DB::table('peserta_tes_kompetensi')->insert([
            'no_surat'=> $no_surat,
            'nama'=> $request->name,
            'skema'=> $request->skema,
            'hasil'=> $request->hasil,
        ]);

        return redirect()->route('berita.peserta',['no_surat'=>$no_surat]);
    }

    public function hapusPeserta($id,$no_surat)
    {

        return $id;
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
        return $id;
    }
}
