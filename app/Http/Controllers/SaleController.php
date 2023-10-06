<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Inventory;
use Illuminate\Http\Request;
use App\DataTables\SalesDataTable;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(SalesDataTable $dataTable)
    {
        return $dataTable->render('sale.datatable');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $inventories = Inventory::all();
        $lastId = Sale::orderBy('id','desc')->first();
        return view('sale.create',compact('inventories','lastId'));
    }

    public function tableAwal($i)
    {
        $inventories = Inventory::all();
        return view('sale.table-awal-sale',compact('inventories','i'));
    }

    public function tableTambahan($i)
    {
        $inventories = Inventory::all();
        return view('sale.table-tambahan-sale',compact('inventories','i'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // return $request;
        Sale::create([
            'number' => $request->number,
            'user_id' => session('user_id'),
            'date' => date('Y-m-d')
        ]);

        $salesId = Sale::orderBy('id','desc')->first();

        foreach ($request->sales as $sale) {

            DB::table('sales_details')->insert([
                'sales_id' => $salesId->id,
                'inventory_id' => $sale['inventory_id'],
                'qty' => $sale['qty'],
                'price' => $sale['price'],
            ]);
         
        }


        Alert::success("berhasil menambahkan data","redirect ke halaman sale index");

        return redirect()->route('sale.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return $id;
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
        Sale::find($id)->delete();

        Alert::success("berhasil menghapus data","redirect ke halaman sale index");

        return redirect()->route('sale.index');
    }
}
