<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Unit;

class UnitController extends Controller
{
    public function index()
    {
        $unit = Unit::all(); // Mengambil semua isi tabel
        $paginate = Unit::orderBy('id', 'asc')->paginate(3);
        return view('admin.stock.index', ['stocks' => $unit, 'paginate' => $paginate]);
    }

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
            'satuan' => 'required',
        ]);

        //fungsi eloquent untuk menambah data
        Unit::create([
            'satuan' => $request->satuan,
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
    public function show($id_unit)
    {
        $unit = Unit::where('id_unit', $id_unit)->first();
        return view('stock.detail', compact('Unit'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_unit)
    {
        $unit = DB::table('units')->where('id', $id_unit)->first();
        return view('admin.stock.edit', compact('units'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_unit)
    {
        //melakukan validasi data
        $request->validate([
            'satuan' => 'required',
        ]);
        //fungsi eloquent untuk mengupdate data inputan kita
        Unit::where('id', $id_unit)
            ->update([
                'satuan' => $request->satuan,
            ]);

        //jika data berhasil diupdate, akan kembali ke halaman utama
        return redirect()->to('/admin/stock')
            ->with('success', 'Stock Berhasil Diupdate');
    }
}
