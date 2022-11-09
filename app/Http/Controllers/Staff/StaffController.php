<?php

namespace App\Http\Controllers\Staff;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $staff = User::all(); // Mengambil semua isi tabel
        $paginate = User::orderBy('id', 'asc')->paginate(3);
        return view('Staff.home.index', ['staff' => $staff, 'paginate' => $paginate]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('staff.create');
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
            'name' => 'required',
            'email' => 'required',
            'no_hp' => 'required',
        ]);
        //fungsi eloquent untuk menambah data
        User::create($request->all()); //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('staff.home.index')
            ->with('success', 'staff Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $staff = User::where('id', $id)->first();
        // return view('staff.home.detail', compact('staff'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $staff = DB::table('users')->where('id', $id)->first();
        return view('staff.home.edit', compact('staff'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //melakukan validasi data
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'no_hp' => 'required',
        ]);
        //fungsi eloquent untuk mengupdate data inputan kita
        User::where('id', $id)
            ->update([
                'name' => $request->name,
                'email' => $request->email,
                'no_hp' => $request->no_hp,
            ]);
        //jika data berhasil diupdate, akan kembali ke halaman utama
        return redirect()->route('staff.home.index')
            ->with('success', 'Staff Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //fungsi eloquent untuk menghapus data
        User::where('id', $id)->delete();
        return redirect()->route('staff.index')
            ->with('success', 'Staff Berhasil Dihapus');
    }
}
