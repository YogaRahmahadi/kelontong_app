<?php

namespace App\Http\Controllers\Admin;

use App\Models\Stock;
use App\Models\Unit;
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
        return view('admin.stock.index', ['stocks' => $stock, 'paginate' => $paginate]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $unit = Unit::all();
        return view('admin.stock.create', compact('unit'));
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
            'volume' => 'required',
            'unit_id' => 'required',
            'photo' => 'required',
        ]);

        if ($request->file('photo')) {
            $image_name = $request->file('photo')->store('stocks', 'public');
        }

        //fungsi eloquent untuk menambah data
        Stock::create([
            'nama_barang' => $request->nama_barang,
            'hargabeli' => $request->hargabeli,
            'hargajual' => $request->hargajual,
            'volume' => $request->volume,
            'unit_id' => $request->unit_id,
            'photo' => $image_name,
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
        return view('stock.detail', compact('stock'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_stock)
    {
        $stock = DB::table('stocks')->where('id', $id_stock)->first();
        $unit = Unit::all();
        return view('admin.stock.edit', compact('stock', 'unit'));
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
            'volume' => 'required',
            'unit_id' => 'required',
            'photo' => 'required',
        ]);

        $stock = Stock::where('id', $id_stock)->first();
        if ($request->file('photo')) {
            $image_name = $request->file('photo')->store('stocks', 'public');
        }
        //fungsi eloquent untuk mengupdate data inputan kita
        Stock::where('id', $id_stock)
            ->update([
                'nama_barang' => $request->nama_barang,
                'hargabeli' => $request->hargabeli,
                'hargajual' => $request->hargajual,
                'volume' => $request->volume,
                'unit_id' => $request->unit_id,
                'photo' => ($image_name == null) ? $stock->photo : $image_name,
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
            ->with('success', 'Stock Berhasil Dihapus');
    }
}
