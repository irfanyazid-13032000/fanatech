<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PersonaliaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('personalia.index');
    }

    public function status($id)
    {
        $personalia = DB::table('personalia')
        ->where('id',$id)
        ->first();
       
        return view('personalia.status',compact('personalia'));
    }

    public function lengkap($id)
    {
        DB::table('personalia')
            ->where('id',$id)
            ->update([
            'status' => 'lengkap'
        ]);
    
        return redirect()->route('personalia.status',['id'=>$id]);
    }

    public function belumLengkap($id)
    {
        DB::table('personalia')
            ->where('id',$id)
            ->update([
            'status' => 'belum lengkap'
        ]);
    
        return redirect()->route('personalia.status',['id'=>$id]);
    }

    public function tolak($id)
    {
        DB::table('personalia')
            ->where('id',$id)
            ->update([
            'status' => 'tolak'
        ]);
    
        return redirect()->route('personalia.status',['id'=>$id]);
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
