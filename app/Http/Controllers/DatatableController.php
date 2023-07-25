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
        // return 'klkl';
        $pengalaman = DB::table('persyaratan_pengalaman')->get();
       
        return datatables()->of($pengalaman)->toJson();
    }
}
