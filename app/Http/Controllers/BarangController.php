<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $barang = Barang::all();

        if ($barang->isEmpty()) {
            return response()->json(['message' => 'Barang kosong'], 200);
        }
        return response()->json(
            $barang,
            200
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode_barang' => 'required|string',
            'name' => 'required|string',
            'stock' => 'required|numeric',
            'harga' => 'required|numeric',
            'satuan_id' => 'required|exists:satuans,id',
            'supplier_id' => 'required|exists:suppliers,id'
        ]);

        $barang = Barang::create($request->all());

        return response()->json([
            'message' => 'Barang berhasil ditambahkan',
            'data' => $barang
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $barang = Barang::find($id);

        if (!$barang) {
            return response()->json(['message' => 'Barang tidak ditemukan'], 200);
        };

        return response()->json([
            'message' => 'Barang ditemukan',
            'data' => $barang
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $barang = Barang::find($id);

        if (!$barang) {
            return response()->json(['message' => 'Barang tidak ditemukan'], 404);
        };

        $request->validate([
            'kode_barang' => 'required|string',
            'name' => 'required|string',
            'stock' => 'required|numeric',
            'harga' => 'required|numeric',
            'satuan_id' => 'required|exists:satuans,id',
            'supplier_id' => 'required|exists:suppliers,id'
        ]);

        $barang->update($request->all());

        return response()->json([
            'message' => 'Barang berhasil diubah',
            'data' => $barang
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $barang = Barang::find($id);

        $barang->delete();

        return response()->json([
            'message' => 'Barang berhasil dihapus'
        ], 200);
    }
}
