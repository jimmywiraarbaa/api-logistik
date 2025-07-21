<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $karyawan = User::all();

        if ($karyawan->isEmpty()) {
            return response()->json(['message' => 'Belum ada karyawan']);
        }

        return response()->json(
            $karyawan,
            200
        );
    }

    public function show(string $id)
    {
        $karyawan = User::find($id);

        if (!$karyawan) {
            return response()->json(['message' => 'Karyawan tidak ditemukan'], 200);
        }

        return response()->json([
            'message' => 'Karyawan ditemukan',
            'data' => $karyawan
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $karyawan = User::find($id);

        if (!$karyawan) {
            return response()->json(['message' => 'Data karyawan tidak ditemukan'], 404);
        }

        $request->validate([
            'name' => 'sometimes|required|string',
            'email' => 'sometimes|required|email|unique:users,email,' . $id,
            'password' => 'sometimes|nullable|confirmed|min:6',
            'role' => 'sometimes|required|numeric|min:1',
        ]);

        $karyawan->update($request->only(['name', 'email', 'password', 'role']));

        return response()->json([
            'message' => 'Karyawan telah diupdate',
            'data' => $karyawan
        ], 200);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $karyawan = User::find($id);

        if (!$karyawan) {
            return response()->json(['message' => 'Karyawan tidak ada']);
        }

        $karyawan->delete();

        return response()->json([
            'message' => 'Karyawan dipecat'
        ]);
    }
}
