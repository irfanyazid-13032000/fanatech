<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Purchase;
use App\Models\Inventory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\DataTables\PurchaseDataTable;
use RealRashid\SweetAlert\Facades\Alert;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(PurchaseDataTable $dataTable)
    {
        return $dataTable->render('purchase.datatable');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $purchases = Purchase::all();
        $lastId = Purchase::orderBy('id','desc')->first();
        // dd($lastId);
        return view('purchase.create',compact('purchases','lastId'));
    }

    public function tableAwal($i)
    {
        $inventories = Inventory::all();
        return view('purchase.table-awal-purchase',compact('inventories','i'));
    }

    public function tableTambahan($i)
    {
        $inventories = Inventory::all();
        return view('purchase.table-tambahan-purchase',compact('inventories','i'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return $request;
        Purchase::create([
            'number' => $request->number,
            'user_id' => session('user_id'),
            'date' => date('Y-m-d')
        ]);

        $purchaseId = Purchase::orderBy('id','desc')->first();

        foreach ($request->purchases as $purchase) {


            DB::table('purchases_details')->insert([
                'purchase_id' => $purchaseId->id,
                'inventory_id' => $purchase['inventory_id'],
                'qty' => $purchase['qty'],
                'price' => $purchase['price'],
            ]);
        }

        Alert::success("berhasil menambahkan data","redirect ke halaman purchase index");

        return redirect()->route('purchase.index');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('purchase.detail',compact('id'));
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
        Purchase::find($id)->delete();

        DB::table('purchases_details')->where('purchase_id',$id)->delete();

        Alert::success("berhasil menghapus data","redirect ke halaman purchase index");

        return redirect()->route('purchase.index');
    }
}
