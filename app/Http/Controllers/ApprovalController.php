<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Approval;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApprovalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $role = Role::all();
        return view('approval.create',compact('role'));
    }

    public function approver($i)
    {
        
        return view('approval.approver',compact('i'));
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

        Approval::create([
            'title' => $request->judul_approval,
            'comment' => $request->comment,
            'level' => $request->level_approval,
            'document' => 'tidak ada.doc',
        ]);

        $latestApproval = Approval::latest()->first();


        foreach ($request->approver as $key => $value) {
            DB::table('approver_approvals')->insert([
                'approval_id' => $latestApproval->id,
                'level_approval' => $key+1,
                'approver' => $value,
                'comment' => 'tidak ada',
                'created_at' => now(),
            ]);
        }

        DB::table('giliran_approves')->insert([
            'approval_id' => $latestApproval->id,
            'approver' => $request->approver[0],
            'created_at' => now(),
        ]);
        



        dd($request); 
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