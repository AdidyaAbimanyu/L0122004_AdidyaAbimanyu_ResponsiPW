<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $pegawai = Pegawai::all();
        return view('admin.index', compact('pegawai'));
    }

    public function tambah()
    {
        return view('forminsert');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'age' => 'required|integer',
            'email' => 'required|string|email|max:255',
        ]);

        Pegawai::create([
            'nama' => $validatedData['nama'],
            'age' => $validatedData['age'],
            'email' => $validatedData['email'],
        ]);

        return redirect()->route('admin.index')->with('success', 'Data inserted successfully');
    }

    public function edit($id)
    {
        $pegawai = Pegawai::findOrFail($id);
        return view('admin.formedit', compact('pegawai'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'age' => 'required|integer',
            'email' => 'required|string|email|max:255',
        ]);

        $pegawai = Pegawai::findOrFail($id);
        $pegawai->update($validatedData);

        return redirect()->route('admin.index')->with('success', 'Data updated successfully');
    }

    public function hapus($id)
    {
        $pegawai = Pegawai::findOrFail($id);
        return view('admin.formdelete', compact('pegawai'));
    }

    public function destroy(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required|integer|exists:pegawais,id',
        ]);

        $pegawai = Pegawai::findOrFail($request->input('id'));
        $pegawai->delete();

        return redirect()->route('admin.index')->with('success', 'Data deleted successfully');
    }
}
