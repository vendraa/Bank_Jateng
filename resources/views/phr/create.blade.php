@extends('layouts.app')

@section('content')

<div class="pagetitle">
    <h1>Input PHR</h1>
    <nav style="--bs-breadcrumb-divider: '|';">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('nasabah.index') }}">Daftar Nasabah</a></li>
        <li class="breadcrumb-item">Input PHR</li>
      </ol>
    </nav>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">

                <h5 class="card-title">Create PHR</h5>

                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <h4 class="alert-heading">
                        <i class="bi bi-exclamation-triangle-fill me-2"></i>Catatan Penting
                    </h4>
                    <p>
                        <i class="bi bi-currency-exchange me-1"></i>
                        Saat mengisi nominal uang, gunakan angka tanpa titik atau simbol mata uang. Contoh: tulis <strong>1000000</strong> untuk "Rp1.000.000".
                    </p>
                    <hr>
                    <p class="mb-0">
                        <i class="bi bi-save2 me-1"></i>
                        Jangan lupa klik tombol <strong>"Submit"</strong> pada bagian <strong>PHR Lain</strong> untuk menyimpan perubahan yang telah Anda lakukan.
                    </p>
                </div>                

                <ul class="nav nav-tabs nav-tabs-bordered d-flex" id="borderedTabJustified" role="tablist">
                    <li class="nav-item flex-fill" role="presentation">
                        <button class="nav-link w-100 active" id="tabungan-tab" data-bs-toggle="tab" data-bs-target="#bordered-justified-tabungan" type="button" role="tab" aria-controls="bordered-justified-tabungan" aria-selected="true">Tabungan</button>
                    </li>
                    <li class="nav-item flex-fill" role="presentation">
                        <button class="nav-link w-100" id="credit-tab" data-bs-toggle="tab" data-bs-target="#bordered-justified-credit" type="button" role="tab" aria-controls="bordered-justified-credit" aria-selected="false">Fasilitas Kredit</button>
                    </li>
                    <li class="nav-item flex-fill" role="presentation">
                        <button class="nav-link w-100" id="payroll_pegawai-tab" data-bs-toggle="tab" data-bs-target="#bordered-justified-payroll_pegawai" type="button" role="tab" aria-controls="bordered-justified-payroll_pegawai" aria-selected="false">Payroll Pegawai</button>
                    </li>
                    <li class="nav-item flex-fill" role="presentation">
                        <button class="nav-link w-100" id="plo_pegawai-tab" data-bs-toggle="tab" data-bs-target="#bordered-justified-plo_pegawai" type="button" role="tab" aria-controls="bordered-justified-plo_pegawai" aria-selected="false">PLO Pegawai</button>
                    </li>
                    <li class="nav-item flex-fill" role="presentation">
                        <button class="nav-link w-100" id="bima_mobile-tab" data-bs-toggle="tab" data-bs-target="#bordered-justified-bima_mobile" type="button" role="tab" aria-controls="bordered-justified-bima_mobile" aria-selected="false">BIMA Mobile</button>
                    </li>
                    <li class="nav-item flex-fill" role="presentation">
                        <button class="nav-link w-100" id="dplk-tab" data-bs-toggle="tab" data-bs-target="#bordered-justified-dplk" type="button" role="tab" aria-controls="bordered-justified-dplk" aria-selected="false">DPLK</button>
                    </li>
                    <li class="nav-item flex-fill" role="presentation">
                        <button class="nav-link w-100" id="phr_lain-tab" data-bs-toggle="tab" data-bs-target="#bordered-justified-phr_lain" type="button" role="tab" aria-controls="bordered-justified-phr_lain" aria-selected="false">PHR Lain</button>
                    </li>
                </ul>

                <form action="{{ route('phr.store') }}" method="POST" onsubmit="window.isFormSubmitting = true;" >
                    @csrf
                    <input type="hidden" name="nasabah_id" value="{{ $nasabah->id }}">

                    <div class="tab-content pt-2" id="borderedTabJustifiedContent">
                        <div class="tab-pane fade show active" id="bordered-justified-tabungan" role="tabpanel" aria-labelledby="tabungan-tab">
                            <h5 class="card-title">Tabungan/Giro/Deposito</h5>
                            <p>Masukkan Data Pada Bagian Ini Terlebih Dahulu Sebelum ke Bagian Lain</p>
                        
                            <div class="row mb-3">
                                <label class="col-md-4 col-lg-3 col-form-label">Nama Bank</label>
                                <div class="col-md-8 col-lg-9">
                                    <input type="text" class="form-control @error('nama_bank') is-invalid @enderror" name="nama_bank" value="{{ old('nama_bank') }}">
                                    @error('nama_bank')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        
                            <div class="row mb-3">
                                <label class="col-md-4 col-lg-3 col-form-label">Rekening</label>
                                <div class="col-md-8 col-lg-9">
                                    <input type="number" class="form-control @error('rekening') is-invalid @enderror" name="rekening" value="{{ old('rekening') }}">
                                    @error('rekening')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        
                            <div class="row mb-3">
                                <label class="col-md-4 col-lg-3 col-form-label">Saldo</label>
                                <div class="col-md-8 col-lg-9">
                                    <input type="number" class="form-control @error('saldo') is-invalid @enderror" name="saldo" value="{{ old('saldo') }}">
                                    @error('saldo')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        
                            <div class="row mb-3">
                                <label class="col-md-4 col-lg-3 col-form-label">Keterangan</label>
                                <div class="col-md-8 col-lg-9">
                                    <input type="text" class="form-control @error('jenis') is-invalid @enderror" name="jenis" value="{{ old('jenis') }}">
                                    @error('jenis')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        
                            <div class="row mb-3">
                                <label class="col-md-4 col-lg-3 col-form-label">Posisi</label>
                                <div class="col-md-8 col-lg-9">
                                    <input type="date" class="form-control @error('posisi') is-invalid @enderror" name="posisi" value="{{ old('posisi') }}">
                                    @error('posisi')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        
                            <div class="d-flex justify-content-end gap-2 mt-4">
                                <button type="button" class="btn btn-primary phr-btn-next-tab">Next</button>
                                <a href="{{ route('nasabah.index') }}" class="btn btn-secondary">Cancel</a>
                            </div>
                        </div>                        

                        <div class="tab-pane fade" id="bordered-justified-credit" role="tabpanel" aria-labelledby="credit-tab">
                            <h5 class="card-title">Fasilitas Kredit</h5>
                            <p>Masukkan Data Pada Bagian Ini Terlebih Dahulu Sebelum ke Bagian Lain</p>
                        
                            <div class="row mb-3">
                                <label class="col-md-4 col-lg-3 col-form-label">Kreditur</label>
                                <div class="col-md-8 col-lg-9">
                                    <input type="text" class="form-control @error('kreditur') is-invalid @enderror" name="kreditur" value="{{ old('kreditur') }}">
                                    @error('kreditur')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        
                            <div class="row mb-3">
                                <label class="col-md-4 col-lg-3 col-form-label">Plafond</label>
                                <div class="col-md-8 col-lg-9">
                                    <input type="number" class="form-control @error('plafond') is-invalid @enderror" name="plafond" value="{{ old('plafond') }}">
                                    @error('plafond')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        
                            <div class="row mb-3">
                                <label class="col-md-4 col-lg-3 col-form-label">Saldo Debit</label>
                                <div class="col-md-8 col-lg-9">
                                    <input type="number" class="form-control @error('saldo_debit') is-invalid @enderror" name="saldo_debit" value="{{ old('saldo_debit') }}">
                                    @error('saldo_debit')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        
                            <div class="row mb-3">
                                <label class="col-md-4 col-lg-3 col-form-label">Tanggal Awal</label>
                                <div class="col-md-8 col-lg-9">
                                    <input type="date" class="form-control @error('tanggal_awal') is-invalid @enderror" name="tanggal_awal" value="{{ old('tanggal_awal') }}">
                                    @error('tanggal_awal')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        
                            <div class="row mb-3">
                                <label class="col-md-4 col-lg-3 col-form-label">Tanggal Akhir</label>
                                <div class="col-md-8 col-lg-9">
                                    <input type="date" class="form-control @error('tanggal_akhir') is-invalid @enderror" name="tanggal_akhir" value="{{ old('tanggal_akhir') }}">
                                    @error('tanggal_akhir')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        
                            <div class="row mb-3">
                                <label class="col-md-4 col-lg-3 col-form-label">Suku Bunga</label>
                                <div class="col-md-8 col-lg-9">
                                    <input type="number" class="form-control @error('suku_bunga') is-invalid @enderror" name="suku_bunga" value="{{ old('suku_bunga') }}">
                                    @error('suku_bunga')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="d-flex justify-content-end gap-2 mt-4">
                                <button type="button" class="btn btn-primary phr-btn-next-tab">Next</button>
                                <button type="button" class="btn btn-secondary phr-btn-back-tab">Back</button>                                    
                                <a href="{{ route('nasabah.index') }}" class="btn btn-secondary">Cancel</a>
                            </div>
                        </div>
                        
                        <div class="tab-pane fade" id="bordered-justified-payroll_pegawai" role="tabpanel" aria-labelledby="payroll_pegawai-tab">
                            <h5 class="card-title">Payroll Pegawai</h5>
                            <p>Masukkan Data Pada Bagian Ini Terlebih Dahulu Sebelum ke Bagian Lain</p>
                        
                            <div class="row mb-3">
                                <label class="col-md-4 col-lg-3 col-form-label">Payroll Bank</label>
                                <div class="col-md-8 col-lg-9">
                                    <input type="text" class="form-control @error('payroll_bank') is-invalid @enderror" name="payroll_bank" value="{{ old('payroll_bank') }}">
                                    @error('payroll_bank')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        
                            <div class="row mb-3">
                                <label class="col-md-4 col-lg-3 col-form-label">NoA Pegawai</label>
                                <div class="col-md-8 col-lg-9">
                                    <input type="number" class="form-control @error('noa_pegawai') is-invalid @enderror" name="noa_pegawai" value="{{ old('noa_pegawai') }}" >
                                    @error('noa_pegawai')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        
                            <div class="row mb-3">
                                <label class="col-md-4 col-lg-3 col-form-label">Nominal Payroll</label>
                                <div class="col-md-8 col-lg-9">
                                    <input type="number" class="form-control @error('nominal_payroll') is-invalid @enderror" name="nominal_payroll" value="{{ old('nominal_payroll') }}">
                                    @error('nominal_payroll')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        
                            <div class="d-flex justify-content-end gap-2 mt-4">
                                <button type="button" class="btn btn-primary phr-btn-next-tab">Next</button>
                                <button type="button" class="btn btn-secondary phr-btn-back-tab">Back</button>                                    
                                <a href="{{ route('nasabah.index') }}" class="btn btn-secondary">Cancel</a>
                            </div>
                        </div>
                        
                        <div class="tab-pane fade" id="bordered-justified-plo_pegawai" role="tabpanel" aria-labelledby="plo_pegawai-tab">
                            <h5 class="card-title">PLO Pegawai</h5>
                            <p>Masukkan Data Pada Bagian Ini Terlebih Dahulu Sebelum ke Bagian Lain</p>
                        
                            <div class="row mb-3">
                                <label class="col-md-4 col-lg-3 col-form-label">NoA</label>
                                <div class="col-md-8 col-lg-9">
                                    <input type="number" class="form-control @error('noa') is-invalid @enderror" name="noa" value="{{ old('noa') }}">
                                    @error('noa')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        
                            <div class="row mb-3">
                                <label class="col-md-4 col-lg-3 col-form-label">Plafond</label>
                                <div class="col-md-8 col-lg-9">
                                    <input type="number" class="form-control @error('plafond_pegawai') is-invalid @enderror" name="plafond_pegawai" value="{{ old('plafond_pegawai') }}">
                                    @error('plafond_pegawai')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        
                            <div class="row mb-3">
                                <label class="col-md-4 col-lg-3 col-form-label">Baki Debit</label>
                                <div class="col-md-8 col-lg-9">
                                    <input type="number" class="form-control @error('baki_debit') is-invalid @enderror" name="baki_debit" value="{{ old('baki_debit') }}">
                                    @error('baki_debit')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        
                            <div class="row mb-3">
                                <label class="col-md-4 col-lg-3 col-form-label">Angsuran per Bulan</label>
                                <div class="col-md-8 col-lg-9">
                                    <input type="number" class="form-control @error('angsuran') is-invalid @enderror" name="angsuran" value="{{ old('angsuran') }}">
                                    @error('angsuran')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        
                            <div class="d-flex justify-content-end gap-2 mt-4">
                                <button type="button" class="btn btn-primary phr-btn-next-tab">Next</button>
                                <button type="button" class="btn btn-secondary phr-btn-back-tab">Back</button>                                    
                                <a href="{{ route('nasabah.index') }}" class="btn btn-secondary">Cancel</a>
                            </div>
                        </div>                        

                        <div class="tab-pane fade" id="bordered-justified-bima_mobile" role="tabpanel" aria-labelledby="bima_mobile-tab">
                            <h5 class="card-title">Mobile Banking Pegawai</h5>
                            <p>Masukkan Data Pada Bagian Ini Terlebih Dahulu Sebelum ke Bagian Lain</p>
                        
                            <div class="row mb-3">
                                <label class="col-md-4 col-lg-3 col-form-label">Mobile Banking</label>
                                <div class="col-md-8 col-lg-9">
                                    <input type="number" class="form-control @error('mobile_banking') is-invalid @enderror" name="mobile_banking" value="{{ old('mobile_banking') }}">
                                    @error('mobile_banking')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        
                            <div class="d-flex justify-content-end gap-2 mt-4">
                                <button type="button" class="btn btn-primary phr-btn-next-tab">Next</button>
                                <button type="button" class="btn btn-secondary phr-btn-back-tab">Back</button>                                    
                                <a href="{{ route('nasabah.index') }}" class="btn btn-secondary">Cancel</a>
                            </div>
                        </div>              

                        <div class="tab-pane fade" id="bordered-justified-dplk" role="tabpanel" aria-labelledby="dplk-tab">
                            <h5 class="card-title">DPLK</h5>
                            <p>Masukkan Data Pada Bagian Ini Terlebih Dahulu Sebelum ke Bagian Lain</p>
                        
                            <div class="row mb-3">
                                <label class="col-md-4 col-lg-3 col-form-label">Jumlah Peserta</label>
                                <div class="col-md-8 col-lg-9">
                                    <input type="number" class="form-control @error('jumlah_peserta') is-invalid @enderror" name="jumlah_peserta" value="{{ old('jumlah_peserta') }}">
                                    @error('jumlah_peserta')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        
                            <div class="row mb-3">
                                <label class="col-md-4 col-lg-3 col-form-label">Akumulasi Iuran</label>
                                <div class="col-md-8 col-lg-9">
                                    <input type="number" class="form-control @error('akumulasi_iuran') is-invalid @enderror" name="akumulasi_iuran" value="{{ old('akumulasi_iuran') }}">
                                    @error('akumulasi_iuran')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        
                            <div class="row mb-3">
                                <label class="col-md-4 col-lg-3 col-form-label">Akumulasi Pengembangan</label>
                                <div class="col-md-8 col-lg-9">
                                    <input type="number" class="form-control @error('akumulasi_pengembangan') is-invalid @enderror" name="akumulasi_pengembangan" value="{{ old('akumulasi_pengembangan') }}">
                                    @error('akumulasi_pengembangan')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        
                            <div class="d-flex justify-content-end gap-2 mt-4">
                                <button type="button" class="btn btn-primary phr-btn-next-tab">Next</button>
                                <button type="button" class="btn btn-secondary phr-btn-back-tab">Back</button>                                    
                                <a href="{{ route('nasabah.index') }}" class="btn btn-secondary">Cancel</a>
                            </div>
                        </div>                        

                        <div class="tab-pane fade" id="bordered-justified-phr_lain" role="tabpanel" aria-labelledby="phr_lain-tab">
                            <h5 class="card-title">Produk Holding Lain</h5>
                            <p>Masukkan Data Pada Bagian Ini Terlebih Dahulu Sebelum ke Bagian Lain</p>

                            <table class="table table-bordered">
                                <thead class="table-info text-center">
                                    <tr>
                                        <th>No</th>
                                        <th>Product Holding</th>
                                        <th class="text-center">Keterangan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>QRIS Rekening Bank Jateng</td>
                                        <td class="text-center align-middle">
                                            <input type="checkbox" name="qris_rekening" value="✓" class="checkmark">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Supplier Rekening Bank Jateng</td>
                                        <td class="text-center align-middle">
                                            <input type="checkbox" name="supplier_rekening" value="✓" class="checkmark">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Buyer Rekening Bank Jateng</td>
                                        <td class="text-center align-middle">
                                            <input type="checkbox" name="buyer_rekening" value="✓" class="checkmark">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>Host to Host Bank Jateng</td>
                                        <td class="text-center align-middle">
                                            <input type="checkbox" name="host_to_host" value="✓" class="checkmark">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td>Penempatan ATM Bank Jateng</td>
                                        <td class="text-center align-middle">
                                            <input type="checkbox" name="penempatan_atm" value="✓" class="checkmark">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            
                            <div class="d-flex justify-content-end gap-2 mt-4">
                                <button type="submit" class="btn btn-primary" id="submitButton">Submit</button>
                                <button type="button" class="btn btn-secondary phr-btn-back-tab">Back</button>                                    
                                <a href="{{ route('nasabah.index') }}" class="btn btn-secondary">Cancel</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@if ($errors->any())
    <div class="modal fade" id="errorSubmitModal" tabindex="-1" aria-labelledby="errorSubmitModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title" id="errorSubmitModalLabel">Gagal Menyimpan Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                </div>
                <div class="modal-body">
                    <p>{{ $errors->first() }}</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
@endif

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const errorModal = document.getElementById("errorSubmitModal");
        if (errorModal) {
            const bsModal = new bootstrap.Modal(errorModal);
            bsModal.show();
        }
    });
</script>

@endsection