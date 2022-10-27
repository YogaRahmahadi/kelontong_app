<?php

namespace App\Http\Controllers\Admin;

use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transaksi = Transaksi::all(); // Mengambil semua isi tabel
        $paginate = Transaksi::orderBy('id', 'asc')->paginate(3);
        return view('admin.transaksi.index', ['transaksi' => $transaksi, 'paginate' => $paginate]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('transaksi.create');
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
            'id_stock' => 'required',
            'tanggal' => 'required',
            'total' => 'required',
            'keterangan' => 'required',
        ]);
        //fungsi eloquent untuk menambah data
        Transaksi::create($request->all()); //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('transaksi.index')
            ->with('success', 'transaksi Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\response
     */
    public function show($id_transaksi)
    {
        $transaksi = Transaksi::where('id', $id_transaksi)->first();
        return view('transaksi.detail', compact('transaksi'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_transaksi)
    {
        $transaksi = DB::table('transaksi')->where('id', $id_transaksi)->first();
        return view('admin.transaksi.edit', compact('transaksi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_transaksi)
    {
        //melakukan validasi data
        $request->validate([
            'id_stock' => 'required',
            'tanggal' => 'required',
            'total' => 'required',
            'keterangan' => 'required',
        ]);
        //fungsi eloquent untuk mengupdate data inputan kita
        Transaksi::where('id', $id_transaksi)
            ->update([
                'stock_id' => $request->id_stock,
                'tanggal' => $request->tanggal,
                'total' => $request->total,
                'keterangan' => $request->keterangan,
            ]);
        //jika data berhasil diupdate, akan kembali ke halaman utama
        return redirect()->route('admin.transaksi.index')
            ->with('success', 'Transaksi Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_transaksi)
    {
        //fungsi eloquent untuk menghapus data
        Transaksi::where('id_transaksi', $id_transaksi)->delete();
        return redirect()->route('transaksi.index')
            ->with('success', 'transaksi Berhasil Dihapus');
    }
}
