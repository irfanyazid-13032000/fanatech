<?php

namespace App\Http\Controllers;

use App\Models\SKK;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DatatableController extends Controller
{

    public function dataSale($id)
    {
        $saleDetails = DB::table('sales_details')->where('sales_id',$id)
                            ->join('inventories','sales_details.inventory_id','=','inventories.id')
                            ->select('sales_details.*','inventories.name')
                            ->get();

        return datatables()->of($saleDetails)->toJson();
    }

    public function dataPurchase($id)
    {
        $purchaseDetails = DB::table('purchases_details')->where('purchase_id',$id)
                                    ->join('inventories','purchases_details.inventory_id','=','inventories.id')
                                    ->select('purchases_details.*','inventories.name')
                                    ->get();

        return datatables()->of($purchaseDetails)->toJson();
    }
    
    

}
