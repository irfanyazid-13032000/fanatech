<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PengalamanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pengalaman.index');
    }

    public function status($id)
    {
        $pengalaman = DB::table('persyaratan_pengalaman')
        ->where('id',$id)
        ->first();

    
        return view('pengalaman.status',compact('pengalaman'));
    }

    public function lengkap($id)
    {
        DB::table('persyaratan_pengalaman')
            ->where('id',$id)
            ->update([
            'status' => 'lengkap'
        ]);
    
        return redirect()->route('pengalaman.status',['id'=>$id]);
    }


    public function belumLengkap($id)
    {
        DB::table('persyaratan_pengalaman')
            ->where('id',$id)
            ->update([
            'status' => 'belum lengkap'
        ]);
    
        return redirect()->route('pengalaman.status',['id'=>$id]);
    }


    public function tolak($id)
    {
        DB::table('persyaratan_pengalaman')
            ->where('id',$id)
            ->update([
            'status' => 'tolak'
        ]);
    
        return redirect()->route('pengalaman.status',['id'=>$id]);
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
