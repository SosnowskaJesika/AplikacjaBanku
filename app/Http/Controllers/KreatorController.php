<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Auth;
use DB;
use Validator;

class KreatorController extends Controller
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
    public function kreator()
    {
        $konta = db::table('konta_detale')
            ->where('id', Auth()->id())
            ->select('imie', 'nazwisko', 'pesel', 'data_urodzenia')
            ->limit(1)
            ->orderby('id', 'desc')
            ->get();

        return view('kreator.dashboard', compact('konta'));
    }

    public function kreator_sukces(Request $request)
    {
        $spr = db::table('konta_detale')
            ->where('id', Auth()->id())
            ->get();
        if (count($spr) === 0) {
            try {
                DB::table('konta_detale')
                    ->where('id', Auth()->id())
                    ->insert([
                        'id' => Auth()->id(),
                        'imie' => $request->imie,
                        'nazwisko' => $request->nazwisko,
                        'pesel' => $request->pesel,
                        'data_urodzenia' => $request->data_urodzenia,
                    ]);
                return new JsonResponse(['success' => true]);
            } catch (\Exception $e) {
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
        } else {
            try {
                DB::table('konta_detale')
                    ->where('id', Auth()->id())
                    ->update([
                        'id' => Auth()->id(),
                        'imie' => $request->imie,
                        'nazwisko' => $request->nazwisko,
                        'pesel' => $request->pesel,
                        'data_urodzenia' => $request->data_urodzenia,
                    ]);
                return new JsonResponse(['success' => true]);
            } catch (\Exception $e) {
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

        return new JsonResponse(['success' => false]);
    }
}
