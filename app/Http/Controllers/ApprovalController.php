<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\Approval;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;

class ApprovalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $role = Role::all();
        // return view('approval.create',compact('role'));
        return view('approval.submitted-approval');
        
    }

    public function approver($i)
    {
        $approvers = User::get();
        
        return view('approval.approver',compact('i','approvers'));
    }

    public function approver_approval($id)
    {
        $approval = Approval::where('id',$id)->get()->first();

        $approvers = DB::table('approver_approvals')
            ->join('users', 'users.id', '=', 'approver_approvals.approver')
            ->select('approver_approvals.*', 'users.name')
            ->where('approval_id', $id)
            ->get();
    
        return view('approval.approver-approval', compact('approvers','approval'));
    }
    

    public function approval()
    {

        $approvals = Approval::get();
        return DataTables::of($approvals)->toJson();

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
            'submitter' => session('user_id')
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
        



       return view('approval.submitted-approval');
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
