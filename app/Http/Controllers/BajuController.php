<?php

namespace App\Http\Controllers;

use App\Models\Baju;
use Illuminate\Http\Request;

class BajuController extends Controller
{
    public function index()
    {
        $bajus = Baju::all();
        return view('index', compact('bajus'));
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'ukuran' => 'required',
            'harga' => 'required|integer',
            'stok' => 'required|integer',
        ]);

        Baju::create($request->all());
        return redirect()->route('index')->with('success', 'Baju berhasil ditambahkan.');
    }

    public function show(Baju $baju)
    {
        return view('show', compact('baju'));
    }

    public function edit(Baju $baju)
    {
        return view('edit', compact('baju'));
    }

    public function update(Request $request, Baju $baju)
    {
        $request->validate([
            'nama' => 'required',
            'ukuran' => 'required',
            'harga' => 'required|integer',
            'stok' => 'required|integer',
        ]);

        $baju->update($request->all());
        return redirect()->route('index')->with('success', 'Baju berhasil diperbarui.');
    }

    public function destroy(Baju $baju)
    {
        $baju->delete();
        return redirect()->route('index')->with('success', 'Baju berhasil dihapus.');
    }
}
