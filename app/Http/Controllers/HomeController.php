<?php

namespace App\Http\Controllers;

use App\Models\Keranjang;
use Illuminate\Http\Request;
<<<<<<< HEAD
=======
use Illuminate\Routing\Controller;
>>>>>>> 7756ea6a4ba85930bcdc14a56eec82823a893afb
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
<<<<<<< HEAD
        return view('home', ['user' => $user]);
    }

    public static function cartCount()
    {
        $cr = Keranjang::where('user_id', Auth::user()->id)->count();
        return $cr;
=======
        return view('admin.home.index', ['user' => $user]);
>>>>>>> 7756ea6a4ba85930bcdc14a56eec82823a893afb
    }
}
