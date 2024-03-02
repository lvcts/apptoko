<?php

namespace App\Http\Controllers;

use App\Models\RacunModel;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;



class ListController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        // $racun_models = RacunModel::with('racun_models')->paginate(10);
        $racun_models = DB::table('racun_models')->paginate(10);

        return view('admin.list', compact('racun_models'));
    }

    /**
     * Show the form for creating a new resource.
     */
    // public function create(): View
    // {
    //     return view('admin.list');
    // }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'namaRacun' => 'required',
            'hargaRacun' => 'required',
            'modalRacun' => 'required',
            'volume' => 'required',
            'kodeRacun' => 'required',
            'jenisRacun' => 'required',
            'stok' => 'required'

        ]);
        DB::table('racun_models')->insert([
            'nama_racun' => $request->namaRacun,
            'harga_racun' => $request->hargaRacun,
            'modal_racun' => $request->modalRacun,
            'volume' => $request->volume,
            'kode_racun' => $request->kodeRacun,
            'jenis_racun' => $request->jenisRacun,
            'stok' => $request->stok,

        ]);

        // RacunModel::create($request->all());

        return redirect()->action([ListController::class, 'index'])
            ->with('success', 'Product created successfully.');
    }

    public function cari(Request $request)
    {       // menangkap data pencarian
        $cari = $request->cari; //request dari form

        // mengambil data dari table racun sesuai pencarian data
        $racun_models = DB::table('racun_models')
            ->where('nama_racun', 'like', "%" . $cari . "%")
            ->orWhere('kode_racun', 'like', "%" . $cari . "%")
            ->paginate(10);


        // mengirim data pegawai ke view index
        return view('admin.list', compact('racun_models'));
    }
    /**
     * Display the specified resource.
     */


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($item): View
    {
        $racun = RacunModel::find($item);
        return view('admin.edit', compact('racun'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $racun): RedirectResponse
    {

        $request->validate([
            'namaRacun' => 'required',
            'hargaRacun' => 'required',
            'modalRacun' => 'required',
            'volume' => 'required',
            'kodeRacun' => 'required',
            'jenisRacun' => 'required',
            'stok' => 'required'

        ]);
        $find = RacunModel::find($racun);
        $find->update($request->all());
        return back()->with('success', 'Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($item): RedirectResponse
    {
        $delete = RacunModel::find($item);
        $delete->delete();
        return back()->with(['success' => 'Data Berhasil Dihapus!']);

        // return redirect()->action([ListController::class, 'index'])
        //     ->with('success', 'Product deleted successfully');
    }
}
