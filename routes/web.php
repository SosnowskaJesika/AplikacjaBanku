<?php

use App\Http\Controllers\KredytController;
use App\Http\Controllers\SumaZadluzeniaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SprawdzaczController;
use App\Http\Controllers\KreatorController;
use App\Http\Controllers\DepozytController;
use App\Http\Controllers\PrzelewController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
// Sprawdzanie czy użytkownik ma uzupełnione tabele niezbędne do funkcjonowania aplikacji, jak nie
// ma, tworzy rekord na id zalogowanego użytkownika z wyzerowanymi wartościami,
// wyjątkiem jest brak "konta", wtedy przenosi nas do kreatora konta.
Route::get('/panel', [SprawdzaczController::class, 'index']);
// Zmiana Danych: Imie,Nazwisko,Pesel,Data Urodzenia
Route::get('/panel/kreator', [KreatorController::class, 'kreator']);
Route::post('/panel/kreator-sukces', [KreatorController::class, 'kreator_sukces']);
// Wykonanie przelewu, aktualizuje saldo obydwu klientów i zapisuje przelew do historii.
Route::get('/panel/przelew', [PrzelewController::class, 'przelew']);
Route::post('/panel/przelew-wyslany', [PrzelewController::class, 'przelew_wyslany']);
// Historia przelewów przychodzących i wychodzących.
Route::get('/panel/historia-przelewow', [PrzelewController::class, 'historia_przelewow']);
// Pokaż stan konta: przychody, dochody i wydatki
Route::get('/panel/saldo', [HomeController::class, 'saldo']);
// Wpłata i Wypłata gotówki
Route::get('/panel/wplata', [DepozytController::class, 'wplata']);
Route::post('/panel/wplata-wykonana', [DepozytController::class, 'wplata_wykonana']);
Route::get('/panel/wyplata', [DepozytController::class, 'wyplata']);
Route::post('/panel/wyplata-wykonana', [DepozytController::class, 'wyplata_wykonana']);
// Zaciąganie jednorazowo kredytu
Route::get('/panel/kredyt', [KredytController::class, 'index']);
Route::post('/panel/kredyt-wez', [KredytController::class, 'wez_kredyt']);
Route::post('/panel/kredyt-wziety', [HomeController::class, 'kredyt_wziety']);
// Suma całkowite zadłużenia kredytem
Route::get('/panel/suma-zadluzenia', [SumaZadluzeniaController::class, 'index']);

Route::get('/panel/splata-zadluzenia', [KredytController::class, 'splata_zadluzenia']);
Route::post('/panel/splata-zadluzenia', [KredytController::class, 'splata_zadluzenia_wykonaj']);

Route::get('/panel/zmien-haslo', [HomeController::class, 'zmien_haslo']);
Route::post('/panel/zmien-haslo-wykonano', [HomeController::class, 'zmien_haslo_wykonano']);
