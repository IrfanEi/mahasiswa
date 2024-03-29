<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;


class MahasiswaController extends Controller
{
    public function index(Request $request) {
        $mahasiswa = Mahasiswa::all();
        return response()->json(["result" => $mahasiswa], 200);
    }

    public function store(Request $request) {
        $mahasiswa = new Mahasiswa;
        $curr_timestamp = date('Y-m-d');
        $today = date("Ymd"); 

        $mahasiswa->name = $request->name;
        //$mahasiswa = Mahasiswa::find($mahasiswaId).sort(nip:-1).limit(1)+1;
        $mahasiswa->nip = $today. '0001';
        $mahasiswa->address = $request->address;
        $mahasiswa->registrationDate = $curr_timestamp;

        $mahasiswa->save();

        return response()->json(["result" => "ok"], 201);
    }

    public function show(Request $request, $mahasiswaId) {
        $mahasiswa = Mahasiswa::find($mahasiswaId);
        return response()->json(["result" => $mahasiswa], 200);
    }

    public function search(Request $request, $nip) {
        $mahasiswa = Mahasiswa::where('nip', '=', $nip)->first();
        return response()->json(["result" => $mahasiswa], 200);
    }

    public function update(Request $request, $mahasiswaId)
    {
        $mahasiswa = Mahasiswa::find($mahasiswaId);

        if (!is_null($request->name)){
            $mahasiswa->name = $request->name;
        }

        if (!is_null($request->nip)){
            $student->nip = $request->nip;
        }

        if (!is_null($request->address)) {
            $student->address = $request->address;
        }

        if (!is_null($request->registrationDate)){
            $mahasiswa->registrationDate = $request->registrationDate;
        }

        $mahasiswa->save();

        return response()->json(["result" => $mahasiswa], 200);       
    }

    public function destroy($mahasiswaId)
    {
        $mahasiswa = Mahasiswa::find($mahasiswaId);
        $mahasiswa->delete();

        return response()->json(["result" => "ok"], 200);       
    }
}
