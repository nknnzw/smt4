<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;


class MahasiswaController extends Controller
{
    public function index()
    {
    return view('pages.data-mahasiswa', ['mahasiswas' => Mahasiswa::all(),]);
    }
    public function create()
    {
    return view('pages.create-mahasiswa');
    }
    public function store(Request $request)
    {
    $validatedData = $request->validate([
    'nama' => 'required|string|max:255',
    'nim' => 'required|string|max:20|unique:mahasiswas,nim',
    'jurusan' => 'required|string|max:255',
    ]);
    Mahasiswa::create($validatedData);
    return redirect()->route('index')->with('success', 'Mahasiswa berhasil ditambahkan.');
    }
    public function edit($id)
    {
    $mahasiswa = Mahasiswa::findOrFail($id);
    return view('pages.edit-mahasiswa', compact('mahasiswa'));
 }
 public function update(Request $request, $id)
 {
 $validatedData = $request->validate([
 'nama' => 'required|string|max:255',
 'nim' => 'required|string|max:20|unique:mahasiswas,nim,' . $id,
 'jurusan' => 'required|string|max:255',
 ]);
 Mahasiswa::whereId($id)->update($validatedData);
 return redirect()->route('index')->with('success', 'Mahasiswa berhasil diperbarui.');
 }
 public function destroy($id)
 {
 $mahasiswa = Mahasiswa::findOrFail($id);
 $mahasiswa->delete();
 return redirect()->route('index')->with('success', 'Mahasiswa berhasil dihapus.');
 }
}

