<?php

namespace App\Http\Controllers;

use App\Models\DPLK;
use App\Models\PLOPegwai;
use App\Models\BankAccount;
use Illuminate\Http\Request;
use App\Models\PayrollPegawai;
use App\Models\FasilitasKredit;
use App\Models\Nasabah;
use App\Models\PHRLain;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PHRController extends Controller
{
    public function index()
    {
        $nasabahs = Nasabah::all();

        return view('phr.index', compact('nasabahs'));
    }

    public function showOutput(Nasabah $nasabah)
    {
        $nasabahs = Nasabah::all();
    
        $bankAccounts = $nasabah->bankAccounts;
        $creditFacilities = $nasabah->creditFacilities;
        $employeePayrolls = $nasabah->employeePayrolls;
        $employeePlos = $nasabah->employeePlos;
        $bimaMobile = $nasabah->bimaMobile;
        $dplk = $nasabah->dplk;
        $namaProdukList = [
            'QRIS Rekening Bank Jateng',
            'Supplier Rekening Bank Jateng',
            'Buyer Rekening Bank Jateng',
            'Host to Host Bank Jateng',
            'Penempatan ATM Bank Jateng',
        ];
        
        $phrLainDB = $nasabah->phrLain->keyBy('nama_produk');
        
        $phrLain = collect($namaProdukList)->map(function ($namaProduk) use ($phrLainDB, $nasabah) {
            if ($phrLainDB->has($namaProduk)) {
                return $phrLainDB->get($namaProduk);
            }
        
            return (object)[
                'nama_produk' => $namaProduk,
                'status' => 'false',
                'nasabah_id' => $nasabah->id
            ];
        });        
    
        return view('phr.index', compact(
            'nasabahs',
            'nasabah',
            'bankAccounts',
            'creditFacilities',
            'employeePayrolls',
            'employeePlos',
            'bimaMobile',
            'dplk',
            'phrLain'
        ));
    }    

    public function create(Nasabah $nasabah)
    {
        return view('phr.create', compact('nasabah'));
    }

    public function store(Request $request)
    {
        Log::info('Data Request:', $request->all());
    
        try {
            $validatedData = $request->validate([
                'nasabah_id' => 'required|exists:nasabahs,id',
                'nama_bank' => 'nullable|string|max:255',
                'rekening' => 'nullable|numeric',
                'saldo' => 'nullable|string|max:255',
                'jenis' => 'nullable|string|max:255',
                'posisi' => 'nullable|date',
                'kreditur' => 'nullable|string|max:255',
                'plafond' => 'nullable|string',
                'saldo_debit' => 'nullable|string|max:255',
                'tanggal_awal' => 'nullable|date',
                'tanggal_akhir' => 'nullable|date',
                'suku_bunga' => 'nullable|string|max:255',
                'payroll_bank' => 'nullable|string|max:255',
                'noa_pegawai' => 'nullable|numeric',
                'nominal_payroll' => 'nullable|string|max:255',
                'noa' => 'nullable|numeric',
                'plafond_pegawai' => 'nullable|string',
                'baki_debit' => 'nullable|string|max:255',
                'angsuran' => 'nullable|string|max:255',
                'mobile_banking' => 'nullable|numeric',
                'jumlah_peserta' => 'nullable|numeric',
                'akumulasi_iuran' => 'nullable|string',
                'akumulasi_pengembangan' => 'nullable|string|max:255',
                'qris_rekening' => 'nullable|string',
                'supplier_rekening' => 'nullable|string',
                'buyer_rekening' => 'nullable|string',
                'host_to_host' => 'nullable|string',
                'penempatan_atm' => 'nullable|string',
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::error('Validasi Gagal:', $e->errors());
            return back()->withErrors($e->errors())->withInput();
        }
    
        $userId = Auth::id();
        $nasabahId = $validatedData['nasabah_id'];
    
        Log::info("User ID: {$userId}, Nasabah ID: {$nasabahId}");
    
        DB::beginTransaction();
        try {
            if ($request->filled(['nama_bank', 'rekening'])) {
                BankAccount::create([
                    'nasabah_id' => $nasabahId,
                    'user_id' => $userId,
                    'nama_bank' => $validatedData['nama_bank'],
                    'rekening' => $validatedData['rekening'],
                    'saldo' => $validatedData['saldo'],
                    'jenis' => $validatedData['jenis'],
                    'posisi' => $validatedData['posisi'],
                    'mobile_banking' => $validatedData['mobile_banking'],
                ]);
            }
    
            if ($request->filled(['kreditur', 'plafond'])) {
                FasilitasKredit::create([
                    'nasabah_id' => $nasabahId,
                    'user_id' => $userId,
                    'kreditur' => $validatedData['kreditur'],
                    'plafond' => $validatedData['plafond'],
                    'saldo_debit' => $validatedData['saldo_debit'],
                    'tanggal_awal' => $validatedData['tanggal_awal'],
                    'tanggal_akhir' => $validatedData['tanggal_akhir'],
                    'suku_bunga' => $validatedData['suku_bunga'],
                ]);
            }
    
            if ($request->filled(['payroll_bank', 'noa_pegawai'])) {
                PayrollPegawai::create([
                    'nasabah_id' => $nasabahId,
                    'user_id' => $userId,
                    'payroll_bank' => $validatedData['payroll_bank'],
                    'noa_pegawai' => $validatedData['noa_pegawai'],
                    'nominal_payroll' => $validatedData['nominal_payroll'],
                ]);
            }
    
            if ($request->filled(['noa', 'plafond_pegawai'])) {
                PLOPegwai::create([
                    'nasabah_id' => $nasabahId,
                    'user_id' => $userId,
                    'noa' => $validatedData['noa'],
                    'plafond_pegawai' => $validatedData['plafond_pegawai'],
                    'baki_debit' => $validatedData['baki_debit'],
                    'angsuran' => $validatedData['angsuran'],
                ]);
            }
    
            if ($request->filled(['jumlah_peserta', 'akumulasi_iuran'])) {
                DPLK::create([
                    'nasabah_id' => $nasabahId,
                    'user_id' => $userId,
                    'jumlah_peserta' => $validatedData['jumlah_peserta'],
                    'akumulasi_iuran' => $validatedData['akumulasi_iuran'],
                    'akumulasi_pengembangan' => $validatedData['akumulasi_pengembangan'],
                ]);
            }
    
            $phrLainFields = [
                'qris_rekening',
                'supplier_rekening',
                'buyer_rekening',
                'host_to_host',
                'penempatan_atm'
            ];
    
            $phrLainDiisi = collect($phrLainFields)->some(fn($field) => $request->has($field));
    
            if ($phrLainDiisi) {
                $products = [
                    'QRIS Rekening Bank Jateng' => $request->filled('qris_rekening') ? 'true' : 'false',
                    'Supplier Rekening Bank Jateng' => $request->filled('supplier_rekening') ? 'true' : 'false',
                    'Buyer Rekening Bank Jateng' => $request->filled('buyer_rekening') ? 'true' : 'false',
                    'Host to Host Bank Jateng' => $request->filled('host_to_host') ? 'true' : 'false',
                    'Penempatan ATM Bank Jateng' => $request->filled('penempatan_atm') ? 'true' : 'false',
                ];
    
                foreach ($products as $namaProduk => $status) {
                    if ($status === 'true') {
                        PHRLain::updateOrCreate(
                            ['nasabah_id' => $nasabahId, 'nama_produk' => $namaProduk],
                            [
                                'status' => $status,
                                'user_id' => $userId,
                                'nasabah_id' => $nasabahId
                            ]
                        );
                    } else {
                        PHRLain::where('nasabah_id', $nasabahId)
                            ->where('nama_produk', $namaProduk)
                            ->delete();
                    }
                }
            }        
    
            DB::commit();
            return redirect()->route('nasabah.index')->with('phr_success', 'Data berhasil disimpan.');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Terjadi kesalahan saat menyimpan data: ' . $e->getMessage());
            return back()->withErrors(['msg' => 'Terjadi kesalahan, data gagal disimpan.'])->withInput();
        }
    }
    
      
}
