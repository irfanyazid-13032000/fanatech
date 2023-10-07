<?php

namespace App\Http\Controllers;

use App\Models\SKK;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DatatableController extends Controller
{
    public function dataSKK()
    {
        $allskk = DB::table('klasifikasi_kualifikasi')->get();

        return datatables()->of($allskk)->toJson();
    }

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
    
    
    public function dataPelatihan()
    {
        $pelatihan = DB::table('pelatihan')->get();
       
        return datatables()->of($pelatihan)->toJson();
    }
    public function dataPendidikan()
    {
        $pendidikan = DB::table('pendidikan')->get();
       
        return datatables()->of($pendidikan)->toJson();
    }
    public function dataPersonalia()
    {
        $personalia = DB::table('personalia')->get();
       
        return datatables()->of($personalia)->toJson();
    }
    public function dataPengalaman()
    {
        $pengalaman = DB::table('persyaratan_pengalaman')->get();
       
        return datatables()->of($pengalaman)->toJson();
    }

    public function dataInvoice()
    {
        $invoice = DB::table('invoice')->get();
       
        return datatables()->of($invoice)->toJson();
    }

    public function dataConfirm()
    {
        $confirm_payment = DB::table('confirm_payment')->get();
       
        return datatables()->of($confirm_payment)->toJson();
    }
    public function dataAsesor()
    {
        $asesors = DB::table('asesors')->get();
       
        return datatables()->of($asesors)->toJson();
    }
    public function dataUndangan()
    {
        $undangan = DB::table('undangan')->get();
       
        return datatables()->of($undangan)->toJson();
    }


    public function dataBeritaAcara()
    {
        $berita_acara = DB::table('berita_acara')->get();
       
        return datatables()->of($berita_acara)->toJson();
    }


    public function dataLampiran()
    {
        $lampiran = DB::table('lampiran')->get();
       
        return datatables()->of($lampiran)->toJson();
    }
}
