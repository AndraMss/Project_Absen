<?php

namespace App\Http\Controllers;

use App\Models\Absen;
use Illuminate\Http\Request;

class AbsenController extends Controller
{
    public function index()
    {
        $data = Absen::orderBy('created_at', 'desc')->get();
        return view('absen.index', compact('data'));
    }

    public function create()
    {
        return view('absen.form');
    }

    public function store(Request $request)
    {
        $rules = [
            'nama' => 'required',
            'asal_sekolah' => 'required',
            'status' => 'required',
        ];

        // kalau status bukan A (Alpha), wajib upload bukti
        if ($request->status !== 'A') {
            $rules['bukti'] = 'required|image|mimes:jpg,png,jpeg|max:2048';
        }

        $validated = $request->validate($rules);

        $path = null;
        if ($request->hasFile('bukti')) {
            $path = $request->file('bukti')->store('bukti', 'public');
        }

        Absen::create([
            'nama' => $request->nama,
            'asal_sekolah' => $request->asal_sekolah,
            'status' => $request->status,
            'bukti' => $path,
            'waktu' => now(),
        ]);

        return redirect()->back()->with('success', 'Absen berhasil!');
    }
}
