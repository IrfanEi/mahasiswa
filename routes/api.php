<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
 
Route::get('mahasiswa', function() {
    // If the Content-Type and Accept headers are set to 'application/json', 
    // this will return a JSON structure. This will be cleaned up later.
    return mahasiswa::all();
});
 
Route::get('mahasiswa/{NIP}', function($NIP) {
    return mahasiswa::find($NIP);
});

Route::post('mahasiswa', function(Request $request) {
    return mahasiswa::create($request->all);
});

Route::put('mahasiswa/{NIP}', function(Request $request, $NIP) {
    $mahasiswa = mahasiswa::findOrFail($NIP);
    $mahasiswa->update($request->all());

    return $mahasiswa;
});

Route::delete('mahasiswa/{NIP}', function($NIP) {
    mahasiswa::find($NIP)->delete();

    return 204;
});
/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::get('mahasiswa', 'MahasiswaController@index');
Route::get('mahasiswa/{mahasiswa}', 'MahasiswaController@show');
Route::post('mahasiswa', 'MahasiswaController@store');
Route::put('mahasiswa/{mahasiswa}', 'MahasiswaController@update');
Route::delete('mahasiswa/{mahasiswa}', 'MahasiswaController@delete');
