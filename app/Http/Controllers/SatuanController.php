<?php

namespace App\Http\Controllers;

use App\Models\Satuan;
use Illuminate\Http\Request;

class SatuanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(
            Satuan::all(),
            200
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string'
        ]);

        $satuan = Satuan::create($request->all());

        return response()->json(
            [
                "message" => "Satuan berhasil ditambahkan",
                "data" => $satuan
            ],
            201
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $satuan = Satuan::find($id);

        if (!$satuan) {
            return response()->json(['message' => "Satuan tidak ditemukan"], 404);
        }

        return response()->json([
            'message' => "Satuan ditemukan",
            'data' => $satuan
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $satuan = Satuan::find($id);

        if (!$satuan) {
            return response()->json(['message' => 'Satuan tidak ditemukan']);
        }

        $request->validate([
            'name'
        ]);

        $satuan->update($request->all());

        return response()->json([
            'message' => "Satuan berhasil diupdate",
            'data' => $satuan
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $satuan = Satuan::find($id);

        if (!$satuan) {
            return response()->json(['message' => 'Satuan tidak ditemukan']);
        }

        $satuan->delete();

        return response()->json([
            'message' => "Satuan berhasil dihapus"
        ], 200);
    }
}
