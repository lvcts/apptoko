<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



class RacunController extends Controller
{
    // public function index()
    // {
    //     $model = RacunModel::all();
    //     return view('admin.scan')->with('model', $model); //pemanggilan view

    // }
    public function index()
    {
        // mengambil data dari table racun models
        $racun = DB::table('racun_models')->paginate(10);

        return view('admin.scan', compact('racun'));
    }
    public function scan(Request $request)
    {
        // menangkap data pencarian
        $scan = $request->scan; //request dari form

        // mengambil data dari table racun sesuai pencarian data
        $racun = DB::table('racun_models')
            ->where('kode_racun', 'like', "%" . $scan . "%")
            ->paginate();

        // mengirim data pegawai ke view index
        return view('admin.scan', ['racun' => $racun]);
    }
    public function cari(Request $request)
    {       // menangkap data pencarian
        $cari = $request->cari; //request dari form

        // mengambil data dari table racun sesuai pencarian data
        $racun = DB::table('racun_models')
            ->where('nama_racun', 'like', "%" . $cari . "%")
            ->orWhere('kode_racun', 'like', "%" . $cari . "%")
            ->paginate(10);


        // mengirim data pegawai ke view index
        return view('admin.scan', compact('racun'));
    }
}
