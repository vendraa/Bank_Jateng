<?php

namespace App\Http\Controllers\Nasabah;

use App\Http\Controllers\Controller;
use App\Models\Nasabah;
use Illuminate\Http\Request;

class DaftarNasabahController extends Controller
{
    public function index()
    {
        $daftarNasabah = Nasabah::all();

        return view('nasabah.daftar.index', compact('daftarNasabah'));
    }

    // Menampilkan form edit dengan data nasabah
    public function edit($id)
    {
        $nasabah = Nasabah::findOrFail($id);

        return view('nasabah.daftar.edit', compact('nasabah'));
    }

    // Menyimpan perubahan data nasabah
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'npwp' => 'required|numeric|digits_between:1,16',
            'address' => 'required|string',
            'business_sector' => 'required|string|max:255',
            'key_person' => 'required|string|max:255',
            'phone_number' => 'required|string|max:20',
        ]);

        $nasabah = Nasabah::findOrFail($id);

        // Update data nasabah
        $nasabah->update($request->all());

        return redirect()->route('index')->with('success', 'Data Nasabah berhasil diperbarui.');
    }
}

