<?php

namespace App\Http\Controllers\Nasabah;

use App\Http\Controllers\Controller;
use App\Models\Nasabah;
use Illuminate\Http\Request;

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
    
        Nasabah::create($request->all());
    
        if ($request->has('create_another')) {
            return redirect()->route('create')->with('success', 'Data berhasil disimpan. Tambahkan nasabah baru.');
        }
    
        return redirect()->route('index')->with('success', 'Data berhasil disimpan.');
    }
    
}
