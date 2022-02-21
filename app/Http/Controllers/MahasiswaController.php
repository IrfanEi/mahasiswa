<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\mahasiswa;


class MahasiswaController extends Controller
{
    public function index(Request $request) {
        $mahasiswa = mahasiswa::all();
        return response()->json(["result" => $mahasiswa], 200);
    }

    public function store(Request $request) {
        $mahasiswa = new mahasiswa;

        $mahasiswa->name = $request->name;
        $mahasiswa->nip = $request->nip;
        $mahasiswa->address = $request->address;
        $mahasiswa->registrationDate = $request->registrationDate;

        $mahasiswa->save();

        return response()->json(["result" => "ok"], 201);
    }

    public function show(Request $request, $mahasiswaId) {
        $mahasiswa = mahasiswa::find($mahasiswaId);
        return response()->json(["result" => $mahasiswa], 200);
    }

    public function search(Request $request, $nip) {
        $mahasiswa = mahasiswa::where('nip', '=', $nip)->first();
        return response()->json(["result" => $mahasiswa], 200);
    }

    /*public function update(Request $request, $studentId)
    {
        $student = Student::find($studentId);

        if (!is_null($request->name)){
            $student->name = $request->name;
        }

        if (!is_null($request->nip)){
            $student->nip = $request->nip;
        }

        if (!is_null($request->address)) {
            $student->address = $request->address;
        }

        if (!is_null($request->registrationDate)){
            $student->registrationDate = $request->registrationDate;
        }

        $student->save();

        return response()->json(["result" => $student], 200);       
    }

    public function destroy($studentId)
    {
        $student = Student::find($studentId);
        $student->delete();

        return response()->json(["result" => "ok"], 200);       
    }*/
}
