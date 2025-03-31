<?php

namespace App\Http\Controllers\Nasabah;

use App\Models\Nasabah;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException;

class DataNasabahController extends Controller
{
    public function create() 
    {
        return view('nasabah.data.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'npwp' => 'required|numeric|digits_between:1,16',
            'address' => 'required|string',
            'business_sector' => 'required|string|max:255',
            'key_person' => 'required|string|max:255',
            'phone_number' => 'required|string|max:20',
        ]);
    
        try {
            Nasabah::create([
                'name'              => $request->name,
                'npwp'              => $request->npwp,
                'address'           => $request->address,
                'business_sector'   => $request->business_sector,
                'key_person'        => $request->key_person,
                'phone_number'      => $request->phone_number,
                'user_id'           => Auth::id(),
            ]);
        } catch (QueryException $e) {
            if ($e->getCode() === '23000') { // Integrity constraint violation
                return redirect()->back()
                    ->withInput()
                    ->withErrors(['npwp' => 'NPWP sudah terdaftar. Silakan gunakan NPWP lain.']);
            }
            throw $e; // lemparkan error lain
        }
    
        if ($request->has('create_another')) {
            return redirect()->route('nasabah.create')->with('success', 'Data berhasil disimpan. Tambahkan nasabah baru.');
        }
    
        return redirect()->route('nasabah.index')->with('success', 'Data berhasil disimpan.');
    }
}
