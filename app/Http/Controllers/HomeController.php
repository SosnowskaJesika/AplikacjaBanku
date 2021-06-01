<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;

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
        return view('panel.historia_przelewow');
    }

    public function saldo()
    {
        $salda = db::table('saldo')
        ->where('id', Auth()->id())
        ->select('suma_przychodow','suma_wydatkow','stan_konta')
        ->get();

        return view('panel.saldo', compact('salda'));
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
