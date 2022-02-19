<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\mahasiswa;


class MahasiswaController extends Controller
{
    public function index()
    {
        return mahasiswa::all();
    }

    public function show(mahasiswa $mahasiswa)
    {
        return $mahasiswa;
    }

    public function store(Request $request)
    {
        $mahasiswa = mahasiswa::create($request->all());

        return response()->json($mahasiswa, 201);
    }

    public function update(Request $request, mahasiswa $mahasiswa)
    {
        $mahasiswa->update($request->all());

        return response()->json($mahasiswa, 200);
    }

    public function delete(mahasiswa $mahasiswa)
    {
        $mahasiswa->delete();

        return response()->json(null, 204);
    }
}
