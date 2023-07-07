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
        
        $submitter = User::where('id',$approval->submitter)->get()->first();
    
        return view('approval.approver-approval', compact('approvers','approval','submitter'));
    }
    

    public function approval()
    {

        $approvals = Approval::where('submitter',session('user_id'))->get();
        return DataTables::of($approvals)->toJson();

    }

    public function responsibility()
    {
        // method ini adalah, ketika user lain mengajukan dokumen, lalu kita sebagai orang yang harus mengecek dan meng approve nya
        $responsibilities = DB::table('approver_approvals')
            ->join('approvals', 'approvals.id', '=', 'approver_approvals.approval_id')
            ->where('approver_approvals.approver', session('user_id'))
            ->get();


        return view('approval.responsibility');
    }

    public function responsibilityData()
    {
        $responsibilities = DB::table('approver_approvals')
            ->join('approvals', 'approvals.id', '=', 'approver_approvals.approval_id')
            ->join('giliran_approves', 'giliran_approves.approval_id', '=', 'approvals.id')
            ->join('users', 'users.id', '=', 'giliran_approves.approver')
            ->where('approver_approvals.approver', session('user_id'))
            ->select(
                'approver_approvals.id',
                'approver_approvals.approval_id',
                'approver_approvals.level_approval',
                'users.name as giliran_approve', // Mengganti nama kolom "approver" menjadi "giliran_approve"
                'approver_approvals.comment',
                'approver_approvals.status',
                'approver_approvals.remember_token',
                'approver_approvals.created_at',
                'approver_approvals.updated_at',
                'approvals.document',
                'approvals.title',
                'approvals.level',
                'approvals.submitter'
            )
            ->get();
    
        return DataTables::of($responsibilities)->toJson();
    }
    

    public function lihatApproval($id)
    {

        $approval = Approval::where('id',$id)->get()->first();


        $giliranApprover = DB::table('giliran_approves')->where('approval_id',$id)->get()->first();
        $giliranMu = ($giliranApprover->approver == session('user_id')) ? true : false;

        return view('approval.lihat-approval',compact('approval','giliranMu'));
        // return $approval;
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('approval.create');
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
        try {
        
            $user = Approval::find($id);
            
            if (!$user) {
                return response()->json(['message' => 'Data tidak ditemukan'], 404);
            }
            
            $user->delete();
            
            return redirect('/approval');

            
        } catch (\Exception $e) {
            // Tangani kesalahan jika terjadi
            return response()->json(['message' => 'Terjadi kesalahan saat menghapus data'], 500);
        }
    }

}
