<?php

namespace App\Http\Controllers\Admin;

use App\Models\Stock;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stock = Stock::all(); // Mengambil semua isi tabel
        $paginate = Stock::orderBy('id', 'asc')->paginate(3);
        return view('admin.stock.index', ['stock' => $stock, 'paginate' => $paginate]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.stock.create');
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
            'nama_barang' => 'required',
            'hargabeli' => 'required',
            'hargajual' => 'required',
            'keterangan' => 'required',
        ]);

        //fungsi eloquent untuk menambah data
        Stock::create([
            'nama_barang' => $request->nama_barang,
            'hargabeli' => $request->hargabeli,
            'hargajual' => $request->hargajual,
            'keterangan' => $request->keterangan,
        ]);

        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->to('/admin/stock')
            ->with('success', 'Stock Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_stock)
    {
        $stock = Stock::where('id_stock', $id_stock)->first();
        return view('stock.detail', compact('Stock'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_stock)
    {
        $stock = DB::table('stock')->where('id', $id_stock)->first();
        return view('admin.stock.edit', compact('stock'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_stock)
    {
        //melakukan validasi data
        $request->validate([
            'nama_barang' => 'required',
            'hargabeli' => 'required',
            'hargajual' => 'required',
            'keterangan' => 'required',
        ]);

        $stock = Stock::where('id', $id_stock)->first();
        //fungsi eloquent untuk mengupdate data inputan kita
        Stock::where('id', $id_stock)
            ->update([
                'nama_barang' => $request->nama_barang,
                'hargabeli' => $request->hargabeli,
                'hargajual' => $request->hargajual,
                'keterangan' => $request->keterangan,
            ]);

        //jika data berhasil diupdate, akan kembali ke halaman utama
        return redirect()->to('/admin/stock')
            ->with('success', 'Stock Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_stock)
    {
        //fungsi eloquent untuk menghapus data
        Stock::where('id', $id_stock)->delete();
        return redirect()->to('/admin/stock')
            ->with('success', 'stock Berhasil Dihapus');
    }
}
