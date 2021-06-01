<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpKernel\EventListener\ValidateRequestListener;

class SumaZadluzeniaController extends Controller
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

        $data = DB::table('kredyt')
            ->where('id', Auth()->id())
            ->get(['wielkosc_kredytu', 'data_splaty_kredytu', 'data_wziecia_kredytu']);

        $result = $data->toArray();
        if (!$result) {
            return view('suma_zadluzenia.suma_zadluzenia', [
                'sumaZadluzenia' => 0,
                'dataSplaty' => '',
                'dataWziecia' => '',
            ]);
        }

        $result = (array)$result[0];

        return view('suma_zadluzenia.suma_zadluzenia', [
            'sumaZadluzenia' => $result['wielkosc_kredytu'],
            'dataSplaty' => substr($result['data_splaty_kredytu'],0, 10),
            'dataWziecia' => substr($result['data_wziecia_kredytu'],0, 10),
        ]);
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
