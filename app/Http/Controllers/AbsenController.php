<?php

namespace App\Http\Controllers;

use App\Models\Absen;
use Illuminate\Http\Request;

class AbsenController extends Controller
{
    public function index() {
        $data = Absen::orderBy('created_at', 'desc')->get();
        return view('absen.index', compact('data'));
    }

    public function create() {
        return view('absen.form');
    }

    public function store(Request $request) {
        $request->validate([
            'nama' => 'required',
            'asal_sekolah' => 'required',
            'status' => 'required|in:H,I,S,A',
            'bukti' => 'nullable|image|max:2048',
        ]);

        if (in_array($request->status, ['H', 'I', 'S']) && !$request->hasFile('bukti')) {
            return back()->withErrors(['bukti' => 'Bukti harus diunggah untuk H, Izin, atau Sakit'])->withInput();
        }

        $path = null;
        if ($request-> hasFile('bukti')) {
            $path = $request->file('bukti')->store('bukti_absen', 'public');
        }

        Absen::create([
            'nama' => $request->nama,
            'asal_sekolah' => $request->asal_sekolah,
            'status' => $request->status,
            'bukti' => $path,
        ]);

        return redirect()->back()->with('success', 'Absen berhasil disimpan');
    }
}
