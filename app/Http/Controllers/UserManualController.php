<?php

namespace App\Http\Controllers;

use App\Models\UserManual;
use Illuminate\Http\Request;

class UserManualController extends Controller
{
    public function index() {
        $data = UserManual::all();
        return view('user.index', compact ('data'));
    }

    public function create() {
        return view('user.form');
    }

    public function store(Request $request) {
        $request->validate([
            'nama' => 'required',
            'asal_sekolah' => 'required',
        ]);
        UserManual::create($request->all());
        return redirect()->route('user.index');
    }

    public function edit($id) {
        $user = UserManual::findOrFail($id);
        return view('user.edit', compact('user'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'nama' => 'required',
            'asal_sekolah' => 'required',
        ]);
        $user = UserManual::findOrFail($id);
        $user->update($request->all());
        return redirect()->route('user.index')->with('success', 'Data berhasil diperbarui');
    }

    public function destroy($id) {
        $user = UserManual::findOrFail($id);
        $user->delete();
        return redirect()->route('user.index')->with('success', 'Data berhasil dihapus');
    }
}
