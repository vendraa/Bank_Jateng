<?php

namespace App\Http\Controllers\Nasabah;

use App\Models\Nasabah;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException;

class DaftarNasabahController extends Controller
{
    public function index()
    {
        $daftarNasabah = Nasabah::all();

        return view('nasabah.daftar.index', compact('daftarNasabah'));
    }

    public function edit($id)
    {
        $nasabah = Nasabah::findOrFail($id);

        return view('nasabah.daftar.edit', compact('nasabah'));
    }

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
    
        try {
            $nasabah->update([
                'name'              => $request->name,
                'npwp'              => $request->npwp,
                'address'           => $request->address,
                'business_sector'   => $request->business_sector,
                'key_person'        => $request->key_person,
                'phone_number'      => $request->phone_number,
                'user_id'           => Auth::id(),
            ]);
        } catch (QueryException $e) {
            if ($e->getCode() === '23000') {
                return redirect()->back()
                    ->withInput()
                    ->withErrors(['npwp' => 'NPWP sudah terdaftar. Silakan gunakan NPWP lain.']);
            }
            throw $e;
        }
    
        return redirect()->route('nasabah.index')->with('success', 'Data Nasabah berhasil diperbarui.');
    }
    
    public function destroy($id)
{
    $nasabah = Nasabah::findOrFail($id);

    try {
        $nasabah->delete();
        return redirect()->route('nasabah.index')->with('phr_success', 'Data nasabah berhasil dihapus.');
    } catch (\Exception $e) {
        return redirect()->route('nasabah.index')->with('error', 'Gagal menghapus data nasabah.');
    }
}

}