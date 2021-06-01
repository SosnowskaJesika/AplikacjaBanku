<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;

class SprawdzaczController extends Controller
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
        $spr = db::table('konta')
        ->where('id', Auth()->id())
        ->select('id')
        ->get();
        if (count($spr) === 0)
        {
            DB::table('konta')->insert([
                'id' => Auth()->id(),
            ]);
        }

        $spr = db::table('saldo')
        ->where('id', Auth()->id())
        ->select('id')
        ->get();
        if (count($spr) === 0)
        {
            DB::table('saldo')->insert([
                'id' => Auth()->id(),
                'suma_przychodow' => 0,
                'suma_wydatkow' => 0,
                'stan_konta' => 0,
            ]);
        }

        $spr = db::table('konta_detale')
        ->where('id', Auth()->id())
        ->select('id')
        ->get();
        if (count($spr) === 0)
        {
            return redirect('/panel/kreator');
        }

        $konta = db::table('konta_detale')
        ->where('id', Auth()->id())
        ->select('imie','nazwisko')
        ->limit(1)
        ->get();

        $salda = db::table('saldo')
        ->where('id', Auth()->id())
        ->select('suma_przychodow','suma_wydatkow', 'stan_konta')
        ->limit(1)
        ->get();

        $transakcjeW = db::table('transakcje')
        ->where('wykonujacy_przelew_id', Auth()->id())
        ->count('wykonujacy_przelew_id');

        $transakcjeO = db::table('transakcje')
        ->where('otrzymujacy_przelew_id', Auth()->id())
        ->count('otrzymujacy_przelew_id');

        $najnowszeP = db::table('transakcje')
        ->where('otrzymujacy_przelew_id', Auth()->id())
        ->orWhere('wykonujacy_przelew_id', Auth()->id())
        ->orderby('id','desc')
        ->limit(3)
        ->get();

        $dane = \Illuminate\Support\Facades\DB::table('transakcje')
            ->where('otrzymujacy_przelew_id', Auth()->id())
            ->orWhere('wykonujacy_przelew_id', Auth()->id())
            ->groupBy('kategoria_przelewu')
            ->orderby('id','desc')
            ->select(\Illuminate\Support\Facades\DB::raw('count(*) as total'), 'kategoria_przelewu')
            ->get();

        $kieszonkowe = 0;
        $wynagrodzenie = 0;
        $faktura = 0;

        foreach ($dane->toArray() as $pojDane) {
            $pojDane = (array)$pojDane;

            if ($pojDane["kategoria_przelewu"] === "Faktura") {
                $faktura = (int)$pojDane["total"];
            }
            if ($pojDane["kategoria_przelewu"] === "Kieszonkowe") {
                $kieszonkowe = (int)$pojDane["total"];
            }
            if ($pojDane["kategoria_przelewu"] === "Wynagrodzenie") {
                $wynagrodzenie = (int)$pojDane["total"];
            }
        }

        $daneNaMiesiac = \Illuminate\Support\Facades\DB::table('transakcje')
            ->where('otrzymujacy_przelew_id', Auth()->id())
            ->orWhere('wykonujacy_przelew_id', Auth()->id())
            ->groupBy(\Illuminate\Support\Facades\DB::raw('month(data_wykonania_przelewu)'))
            ->orderby('id','desc')
            ->select(\Illuminate\Support\Facades\DB::raw('count(*) as total'), \Illuminate\Support\Facades\DB::raw('month(data_wykonania_przelewu) as month'))
            ->get();

        $naMiesiacWynik = [];
        foreach ($daneNaMiesiac->toArray() as $pojDane) {
            $pojDane = (array)$pojDane;

            $naMiesiacWynik[$pojDane['month']] = $pojDane['total'];
        }

        $naMiesiacWynik = json_encode($naMiesiacWynik, JSON_UNESCAPED_SLASHES);

        return view('panel.dashboard', compact('konta','transakcjeO','transakcjeW','salda', 'najnowszeP', 'faktura', 'kieszonkowe', 'wynagrodzenie', 'naMiesiacWynik'));

    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
