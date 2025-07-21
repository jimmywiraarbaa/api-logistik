<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(
            Supplier::all(),
            200
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'alamat' => 'nullable|string',
            'no_hp' => 'nullable|string|max:20',
        ]);

        $supplier = Supplier::create($request->all());

        return response()->json([
            'message' => 'Supplier berhasil ditambahkan',
            'data' => $supplier
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $supplier = Supplier::find($id);

        if (!$supplier) {
            return response()->json(['message' => 'Supplier tidak ditemukan'], 404);
        }

        return response()->json($supplier, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $supplier = Supplier::find($id);

        if (!$supplier) {
            return response()->json(['message' => 'Supplier tidak ditemukan'], 404);
        }

        $request->validate([
            'name' => 'required|string|max:100',
            'alamat' => 'nullable|string',
            'no_hp' => 'nullable|string|max:20',
        ]);

        $supplier->update($request->all());

        return response()->json([
            'message' => 'Supplier berhasil diupdate',
            'data' => $supplier
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $supplier = Supplier::find($id);

        if (!$supplier) {
            return response()->json(['message' => 'Supplier tidak ditemukan'], 404);
        }

        $supplier->delete();

        return response()->json(['message' => 'Supplier berhasil dihapus'], 200);
    }
}
