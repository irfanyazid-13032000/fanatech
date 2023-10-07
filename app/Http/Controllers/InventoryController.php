<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\DataTables\InventoriesDataTable;
 

class InventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(InventoriesDataTable $dataTable)
    {
        return $dataTable->render('inventory.datatable');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("inventory.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Inventory::create([
            'code' => $request->code,
            'name' => $request->name,
            'price' => $request->price,
            'stock' => $request->stock,
        ]);

        Alert::success("berhasil menambahkan data","redirect ke halaman inventory index");

        return redirect()->route('inventory.index');
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
        $inventory = Inventory::find($id);
        return view('inventory.edit',compact('inventory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Inventory::where('id',$id)->update([
            'code'=>$request->code,
            'name'=>$request->name,
            'price'=>$request->price,
            'stock'=>$request->stock,
        ]);

        Alert::success('berhasil mengubah data!!','redirect ke halaman inventory index...');

        return redirect()->route('inventory.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Inventory::find($id)->delete();

        Alert::success("berhasil menghapus data","redirect ke halaman inventory index");

        
        return redirect()->route('inventory.index');
    }
}
