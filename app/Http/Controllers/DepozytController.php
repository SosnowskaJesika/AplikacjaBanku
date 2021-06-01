<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use Validator;

class DepozytController extends Controller
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
    public function wplata()
    {
        $salda = db::table('saldo')
        ->where('id', Auth()->id())
        ->select('stan_konta')
        ->get();

        return view('panel.wplata', compact('salda'));
    }

    public function wplata_wykonana(Request $request)
    {
        $this->validate($request, [
            'wplata' => 'required|min:0',
          ]);

         $sprStanKonta = db::table('saldo')
         ->where('id', Auth()->id())
         ->select('stan_konta')
         ->value('stan_konta');
        $sprStanKonta = $sprStanKonta + $request->wplata;

        $sprSumaPrzychodow = db::table('saldo')
        ->where('id', Auth()->id())
        ->select('suma_przychodow')
        ->value('suma_przychodow');
        $sprSumaPrzychodow = $sprSumaPrzychodow + $request->wplata;

        {
            try {
              DB::table('saldo')
              ->where('id', Auth()->id())
              ->update([
                  'stan_konta' => $sprStanKonta,
                  'suma_przychodow' => $sprSumaPrzychodow,
              ]);
              return redirect()->back()->with('Gratulacje','Pieniądze zostały dodane');
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

    public function wyplata()
    {
        $salda = db::table('saldo')
        ->where('id', Auth()->id())
        ->select('stan_konta')
        ->get();

        return view('panel.wyplata', compact('salda'));
    }

    public function wyplata_wykonana(Request $request)
    {
        $this->validate($request, [
            'wyplata' => 'required|min:0',
          ]);

          $sprStanKonta = db::table('saldo')
          ->where('id', Auth()->id())
          ->select('stan_konta')
          ->value('stan_konta');
         $sprStanKonta = $sprStanKonta - $request->wyplata;

         $sprSumaWydatkow = db::table('saldo')
         ->where('id', Auth()->id())
         ->select('suma_wydatkow')
         ->value('suma_wydatkow');
         $sprSumaWydatkow = $sprSumaWydatkow + $request->wyplata;

        {
            try {
              DB::table('saldo')
              ->where('id', Auth()->id())
              ->update([
                  'stan_konta' => $sprStanKonta,
                  'suma_wydatkow' => $sprSumaWydatkow,
              ]);
              return redirect()->back()->with('Gratulacje','Pieniądze zostały dodane');
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

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
