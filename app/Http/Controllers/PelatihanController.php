<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PelatihanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pelatihan.index');
    }

    public function status($id)
    {
        $pelatihan = DB::table('pelatihan')
            ->where('id',$id)
            ->first();


        
        return view('pelatihan.status',compact('pelatihan'));
    }

    public function lengkap($id)
    {
        DB::table('pelatihan')
        ->where('id',$id)
        ->update([
            'status' => 'lengkap'
        ]);
    
        return redirect()->route('pelatihan.status',['id'=>$id]);
    }

    public function belumLengkap($id)
    {
        DB::table('pelatihan')
        ->where('id',$id)
        ->update([
            'status' => 'belum lengkap'
        ]);
    
        return redirect()->route('pelatihan.status',['id'=>$id]);
    }

    public function tolak($id)
    {
        DB::table('pelatihan')
        ->where('id',$id)
        ->update([
            'status' => 'tolak'
        ]);
    
        return redirect()->route('pelatihan.status',['id'=>$id]);
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
