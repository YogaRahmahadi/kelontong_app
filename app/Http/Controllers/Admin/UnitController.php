<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Unit;
use Illuminate\Support\Facades\DB;

class UnitController extends Controller
{
    public function index()
    {
        $unit = Unit::all(); // Mengambil semua isi tabel
        $paginate = Unit::orderBy('id', 'asc')->paginate(3);
        return view('admin.stock.index', ['stocks' => $unit, 'paginate' => $paginate]);
    }
}
