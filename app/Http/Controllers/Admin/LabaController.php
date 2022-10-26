<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use PDF;
use App\Models\Laba;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class LabaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $laba = Laba::all(); // Mengambil semua isi tabel
        $paginate = Laba::orderBy('id', 'asc')->paginate(3);
        return view('admin.laba.index', ['laba' => $laba, 'paginate' => $paginate]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('laba.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //melakukan validasi data
        $request->validate([
            // 'tanggal' => 'required',
            'uang_masuk' => 'required',
            'uang_keluar' => 'required',
            'laba' => 'required',
        ]);

        //fungsi eloquent untuk menambah data
        laba::create([
            'tanggal' => Carbon::now(),
            'uang_masuk' => $request->uang_masuk,
            'uang_keluar' => $request->uang_keluar,
            'laba' => $request->laba,
        ]);

        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->to('/admin/laba')
            ->with('success', 'Laba Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\response
     */
    public function show($id_laba)
    {
        $laba = Laba::where('id_laba', $id_laba)->first();
        return view('laba.detail', compact('Laba'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_laba)
    {
        $laba = DB::table('laba')->where('id_laba', $id_laba)->first();
        return view('laba.edit', compact('laba'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_laba)
    {
        //melakukan validasi data
        $request->validate([
            'id_laba' => 'required',
            'tanggal' => Carbon::now(),
            'uang_masuk' => $request->uang_masuk,
            'uang_keluar' => $request->uang_keluar,
            'laba' => $request->laba,
        ]);
        //fungsi eloquent untuk mengupdate data inputan kita
        Laba::where('id_laba', $id_laba)
            ->update([
                'id_laba' => $request->id_laba,
                'tanggal' => Carbon::now(),
                'uang_masuk' => $request->uang_masuk,
                'uang_keluar' => $request->uang_keluar,
                'laba' => $request->laba,
            ]);
        //jika data berhasil diupdate, akan kembali ke halaman utama
        return redirect()->route('laba.index')
            ->with('success', 'Laba Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_laba)
    {
        //fungsi eloquent untuk menghapus data
        Laba::where('id_laba', $id_laba)->delete();
        return redirect()->route('laba.index')
            ->with('success', 'Laba Berhasil Dihapus');
    }

    public function cetak_laporan()
    {
        $laba = Laba::all();
        // return view('admin.laba.laporan',['laba' => $laba]);
        $pdf = PDF::loadview('admin.laba.laporan', ['laba' => $laba]);
        return $pdf->stream();
    }
}
