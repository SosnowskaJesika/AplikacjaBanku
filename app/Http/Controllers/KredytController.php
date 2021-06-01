<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;

class KredytController extends Controller
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
        return view('kredyt.kredyt', ["error_info" => '']);
    }

    public function wez_kredyt(Request $request)
    {
        try {

            DB::table('kredyt')
                ->insert([
                    'id' => Auth()->id(),
                    'saldo_id' => Auth()->id(),
                    'wielkosc_kredytu' => $request->kwota,
                    'data_wziecia_kredytu' => (new \DateTime())->format('Y-m-d'),
                    'data_splaty_kredytu' => (new \DateTime())->add(new \DateInterval('P1Y'))->format('Y-m-d'),
                ]);
            return redirect('/panel/suma-zadluzenia');
        } catch (\Throwable $t) {
            $error_info = 'Masz już kredyt!';
            return view('kredyt.kredyt', ['error_info' => $error_info]);
        }
    }

    public function splata_zadluzenia()
    {
        return view('kredyt.splac', ["error_info" => '']);
    }

    public function splata_zadluzenia_wykonaj(Request $request)
    {
        $this->validate($request, [
            'kwota' => 'required|min:0',
        ]);

        $sprStanKredytu = db::table('kredyt')
            ->where('id', Auth()->id())
            ->select('wielkosc_kredytu')
            ->value('wielkosc_kredytu');

        $nowyStanKredytu = $sprStanKredytu - $request->kwota;

        if ($nowyStanKredytu <= 0) {
            DB::table('kredyt')
                ->where('id', Auth()->id())
                ->delete();
            return redirect('/panel/suma-zadluzenia')->with('Gratulacje', 'Rata zotała spłacona!');
        }

        try {
            DB::table('kredyt')
                ->where('id', Auth()->id())
                ->update([
                    'wielkosc_kredytu' => $nowyStanKredytu,
                ]);
            return redirect('/panel/suma-zadluzenia')->with('Gratulacje', 'Rata zotała spłacona!');
        } catch (\Throwable $e) {
            $errorCode = $e->errorInfo[1];
            if ($errorCode == '1048') {
                dd('Ups 1048 | Some fields are required');
            }
            if ($errorCode == '1062') {
                dd('Ups 403 | Some fields are required');
            }

            if ($errorCode == '1064') {
                dd('Ups 422 | Some fields are required');
            }
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
