<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Auth;
use DB;
use Validator;

class PrzelewController extends Controller
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
    public function przelew()
    {
        $salda = db::table('saldo')
        ->where('id', Auth()->id())
        ->select('stan_konta')
        ->get();

        return view('panel.przelew', compact('salda'));
    }

    public function przelew_wyslany(Request $request)
    {
        $this->validate($request, [
            'id_otrzymujacego' => 'required|min:0',
            'kwota' => 'required|min:0',
            'tytul' => 'max:64',
          ]);

          $sprBilansuWys = db::table('saldo')
          ->where('id', Auth()->id())
          ->select('stan_konta')
          ->value('stan_konta');

          $sprBilansuWys = $sprBilansuWys - $request->kwota;

          $sprWydatkowWys = db::table('saldo')
          ->where('id', Auth()->id())
          ->select('suma_wydatkow')
          ->value('suma_wydatkow');

          $sprWydatkowWys = $sprWydatkowWys + $request->kwota;

        {
            try {
              DB::table('saldo')
              ->where('id', Auth()->id())
              ->update([
                  'stan_konta' => $sprBilansuWys,
                  'suma_wydatkow' => $sprWydatkowWys,
              ]);
              DB::table('transakcje')
              ->insert([
                  'wykonujacy_przelew_id' => Auth()->id(),
                  'otrzymujacy_przelew_id' => $request->id_otrzymujacego,
                  'wielkosc_przelewu' => $request->kwota,
                  'tytul_przelewu' => $request->tytul,
                  'kategoria_przelewu' => $request->kategoria,
                  'data_wykonania_przelewu' => Carbon::now(),
              ]);

            $sprBilansuOdb = db::table('saldo')
            ->where('id', Auth()->id())
            ->select('stan_konta')
            ->value('stan_konta');
            $sprBilansuOdb = $sprBilansuOdb + $request->kwota;

            $sprPrzychodowOdb = db::table('saldo')
            ->where('id', Auth()->id())
            ->select('suma_przychodow')
            ->value('suma_przychodow');
            $sprPrzychodowOdb = $sprPrzychodowOdb + $request->kwota;

              DB::table('saldo')
              ->where('id', $request->id_otrzymujacego)
              ->update([
                  'stan_konta' => $sprBilansuOdb,
                  'suma_przychodow' => $sprPrzychodowOdb,
              ]);
              return redirect()->back()->with('Gratulacje','Pieniądze zostały przelane do wskazanego ID');
              }
              catch (\Exception $e) {
                $errorCode = $e->errorInfo[1];
                if($errorCode == '1048'){
                  dd('Ups 1048 | Some fields are required');
                }
                if($errorCode == '1062'){
                  dd('Ups 403 | Some fields are required');
                }

                if($errorCode == '1064'){
                  dd('Ups 422 | Some fields are required');
                }
              }
          }
    }
    public function historia_przelewow()
    {
        $wykonujacy = db::table('transakcje')
        ->where('wykonujacy_przelew_id', Auth()->id())
        ->select('*')
        ->get();

        $otrzymujacy = db::table('transakcje')
        ->where('otrzymujacy_przelew_id', Auth()->id())
        ->select('*')
        ->get();

        return view('panel.historia_przelewow', compact('wykonujacy', 'otrzymujacy'));
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
