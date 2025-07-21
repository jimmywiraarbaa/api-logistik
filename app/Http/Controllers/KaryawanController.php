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
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        // Ambil hanya field yang boleh diupdate
        $data = $request->only(['name', 'email', 'role', 'password']);

        // Kalau password dikirim, hash dulu
        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        } else {
            unset($data['password']); // Jangan update password kalau tidak dikirim
        }

        // Update user
        $user->update($data);

        return response()->json([
            'message' => 'Karyawan telah diupdate',
            'data' => $user
        ]);
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
