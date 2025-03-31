@extends('layouts.app')

@section('content')

<div class="pagetitle">
  <h1>Output PHR</h1>
  <nav style="--bs-breadcrumb-divider: '|';">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
      <li class="breadcrumb-item">Output PHR</li>
    </ol>
  </nav>
</div>

<div class="row">
  <div class="col-lg-12">

    <div class="card">
      <div class="card-body">
        <h5 class="card-title">PHR Nasabah</h5>

        <div class="row mb-3">
          <div class="col-sm-12">
            <select class="form-select" id="nasabah-select">
              <option selected disabled>---Pilih Nama Nasabah---</option>
              @foreach ($nasabahs as $n)
                  <option value="{{ route('phr.output.show', $n->id) }}"
                      @isset($nasabah)
                          {{ $nasabah->id == $n->id ? 'selected' : '' }}
                      @endisset
                  >
                      {{ $n->name }}
                  </option>
              @endforeach
            </select>
          </div>
        </div>

      </div>
    </div>

    @isset($nasabah)
    <div class="card">
    <div class="card-body">
        <h5 class="card-title">Output PHR</h5>

        @if ($bankAccounts->isEmpty() && $creditFacilities->isEmpty() && $employeePayrolls->isEmpty() && 
        $employeePlos->isEmpty() && $bimaMobile->isEmpty() && $dplk->isEmpty() && $phrLain->isEmpty())
        <div class="alert alert-info alert-dismissible fade show text-center" role="alert">
            <i class="bi bi-info-circle me-1">
            </i>Data PHR Tidak Tersedia Untuk Nasabah Ini
        </div>
        @else
        <div class="mb-3">
            <p class="mb-1">
                Nama Nasabah
            </p>
            <strong class="mb-2">{{ $nasabah->name }}</strong>
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

        <div class="tab-content pt-2" id="borderedTabJustifiedContent">
            <div class="tab-pane fade show active" id="bordered-justified-tabungan" role="tabpanel" aria-labelledby="tabungan-tab">
                <h5 class="card-title">
                    Tabungan/Giro/Deposito
                </h5>
            
                @if ($bankAccounts->isEmpty())
                <div class="alert alert-info alert-dismissible fade show text-center" role="alert">
                    <i class="bi bi-info-circle me-1">
                    </i>Tidak ada data Tabungan/Giro/Deposito untuk Nasabah ini
                </div>
                @else
                    @php
                        $totalSaldo = $bankAccounts->sum('saldo');
                    @endphp
            
                    <div class="table-responsive mt-3">
                        <table class="table table-bordered">
                            <thead>
                                <tr class="table-info text-center">
                                    <th>No</th>
                                    <th>Nama Bank</th>
                                    <th>Nomor Rekening</th>
                                    <th>Saldo</th>
                                    <th>Keterangan</th>
                                    <th>Posisi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($bankAccounts as $index => $account)
                                    <tr>
                                        <td class="text-center">{{ $index + 1 }}</td>
                                        <td>{{ $account->nama_bank }}</td>
                                        <td>{{ $account->rekening }}</td>
                                        <td>Rp{{ number_format($account->saldo, 0, ',', '.') }}</td>
                                        <td>{{ $account->jenis }}</td>
                                        <td>{{ \Carbon\Carbon::parse($account->posisi)->translatedFormat('d F Y') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th colspan="3" class="text-center">Jumlah</th>
                                    <th colspan="3">Rp{{ number_format($totalSaldo, 0, ',', '.') }}</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                @endif
            </div>            
        
            <div class="tab-pane fade" id="bordered-justified-credit" role="tabpanel" aria-labelledby="credit-tab">
                <h5 class="card-title">
                    Fasilitas Kredit
                </h5>
            
                @if ($creditFacilities->isEmpty())
                <div class="alert alert-info alert-dismissible fade show text-center" role="alert">
                    <i class="bi bi-info-circle me-1">
                    </i>Tidak ada data fasilitas kredit untuk Nasabah ini
                </div>
                @else
                    @php
                        $totalPlafond = $creditFacilities->sum('plafond');
                        $totalSaldoDebet = $creditFacilities->sum('saldo_debit');
                    @endphp
            
                    <div class="table-responsive mt-3">
                        <table class="table table-bordered">
                            <thead>
                                <tr class="table-info text-center">
                                    <th rowspan="2" class="text-center align-middle">No</th>
                                    <th rowspan="2" class="text-center align-middle">Kreditur</th>
                                    <th rowspan="2" class="text-center align-middle">Plafond</th>
                                    <th rowspan="2" class="text-center align-middle">Saldo Debet</th>
                                    <th colspan="2" class="text-center">Jangka Waktu</th>
                                    <th rowspan="2" class="text-center align-middle">Suku Bunga</th>
                                </tr>
                                <tr class="table-info text-center">
                                    <th class="text-center">Awal</th>
                                    <th class="text-center">Akhir</th>
                                </tr>
                            </thead>                                           
                            <tbody>
                                @foreach ($creditFacilities as $index => $facility)
                                    <tr>
                                        <td class="text-center">{{ $index + 1 }}</td>
                                        <td>{{ $facility->kreditur }}</td>
                                        <td>Rp{{ number_format($facility->plafond, 0, ',', '.') }}</td>
                                        <td>Rp{{ number_format($facility->saldo_debit, 0, ',', '.') }}</td>
                                        <td>{{ \Carbon\Carbon::parse($facility->tanggal_awal)->format('d M Y') }}</td>
                                        <td>{{ \Carbon\Carbon::parse($facility->tanggal_akhir)->format('d M Y') }}</td>
                                        <td>{{ $facility->suku_bunga }}%</td>
                                    </tr>
                                @endforeach
                            </tbody>    
                            <tfoot>
                                <tr>
                                    <th colspan="2" class="text-center">Jumlah</th>
                                    <th>Rp{{ number_format($totalPlafond, 0, ',', '.') }}</th>
                                    <th>Rp{{ number_format($totalSaldoDebet, 0, ',', '.') }}</th>
                                    <th colspan="3"></th>
                                </tr>
                            </tfoot>                    
                        </table>
                    </div>
                @endif
            </div>
            
            <div class="tab-pane fade" id="bordered-justified-payroll_pegawai" role="tabpanel" aria-labelledby="payroll_pegawai-tab">
                <h5 class="card-title">
                    Payroll Pegawai
                </h5>
            
                @if($employeePayrolls->isEmpty())
                <div class="alert alert-info alert-dismissible fade show text-center" role="alert">
                    <i class="bi bi-info-circle me-1">
                    </i>Tidak ada data Payroll Pegawai untuk Nasabah ini
                </div>
                @else
                    @php
                        $totalNoa = $employeePayrolls->sum('noa_pegawai');
                        $totalNominal = $employeePayrolls->sum('nominal_payroll');
                    @endphp
            
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr class="table-info text-center">
                                    <th>No</th>
                                    <th>Payroll Bank</th>
                                    <th>NoA Pegawai</th>
                                    <th>Nominal Payroll</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($employeePayrolls as $index => $payroll)
                                    <tr>
                                        <td class="text-center">{{ $index + 1 }}</td>
                                        <td>{{ $payroll->payroll_bank }}</td>
                                        <td>{{ number_format($payroll->noa_pegawai) }}</td>
                                        <td>Rp{{ number_format($payroll->nominal_payroll, 0, ',', '.') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th colspan="2" class="text-center">Jumlah</th>
                                    <th>{{ number_format($totalNoa) }}</th>
                                    <th>Rp{{ number_format($totalNominal, 0, ',', '.') }}</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                @endif
            </div>
            
            <div class="tab-pane fade" id="bordered-justified-plo_pegawai" role="tabpanel" aria-labelledby="plo_pegawai-tab">
                <h5 class="card-title">
                    PLO Pegawai
                </h5>
        
                @if($employeePlos->isEmpty())
                <div class="alert alert-info alert-dismissible fade show text-center" role="alert">
                    <i class="bi bi-info-circle me-1">
                    </i>Tidak ada data PLO Pegawai untuk Nasabah ini
                </div>
                @else
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr class="table-info text-center">
                                <th>NoA</th>
                                <th>Plafond</th>
                                <th>Baki Debit</th>
                                <th>Angsuran per Bulan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($employeePlos as $plo)
                            <tr>
                                <td>{{ number_format($plo->noa) }}</td>
                                <td>Rp{{ number_format($plo->plafond_pegawai, 0, ',', '.') }}</td>
                                <td>Rp{{ number_format($plo->baki_debit, 0, ',', '.') }}</td>
                                <td>Rp{{ number_format($plo->angsuran, 0, ',', '.') }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @endif
            </div>
        
            <div class="tab-pane fade" id="bordered-justified-bima_mobile" role="tabpanel" aria-labelledby="bima_mobile-tab">
                <h5 class="card-title">
                    Mobile Baning Pegawai
                </h5>
        
                @if($bankAccounts->isEmpty())
                <div class="alert alert-info alert-dismissible fade show text-center" role="alert">
                    <i class="bi bi-info-circle me-1">
                    </i>Tidak ada data Bima Mobile untuk Nasabah ini
                </div>
                @else
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr class="table-info text-center">
                                <th>Aktif Bima Mobile</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bankAccounts as $account)
                            <tr class="text-center">
                                <td>{{ $account->mobile_banking }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @endif
            </div>
        
            <div class="tab-pane fade" id="bordered-justified-dplk" role="tabpanel" aria-labelledby="dplk-tab">
                <h5 class="card-title">
                    DPLK
                </h5>
            
                @if($dplk->isEmpty())
                <div class="alert alert-info alert-dismissible fade show text-center" role="alert">
                    <i class="bi bi-info-circle me-1">
                    </i>Tidak ada data DPLK untuk nasabah ini
                </div>
                @else
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr class="table-info text-center">
                                <th>Jumlah Peserta</th>
                                <th>Akumulasi Iuran</th>
                                <th>Akumulasi Pengembangan</th>
                                <th>Total Saldo</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dplk as $item)
                            <tr>
                                <td>{{ $item->jumlah_peserta }}</td>
                                <td>Rp{{ number_format($item->akumulasi_iuran, 0, ',', '.') }}</td>
                                <td>Rp{{ number_format($item->akumulasi_pengembangan, 0, ',', '.') }}</td>
                                <td>
                                    @php
                                        $totalSaldo = $item->akumulasi_iuran + $item->akumulasi_pengembangan;
                                    @endphp
                                    Rp{{ number_format($totalSaldo, 0, ',', '.') }}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @endif
            </div>
                            
            <div class="tab-pane fade" id="bordered-justified-phr_lain" role="tabpanel" aria-labelledby="phr_lain-tab">
                <h5 class="card-title">
                    Produk Holding Lain
                </h5>
        
                @if($phrLain->isEmpty())
                <div class="alert alert-info alert-dismissible fade show text-center" role="alert">
                    <i class="bi bi-info-circle me-1">
                    </i>Tidak ada data Produk Holding untuk Nasabah ini
                </div>
                @else
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr class="table-info text-center">
                                <th>No</th>
                                <th>Produk Holding</th>
                                <th>Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($phrLain as $index => $item)
                            <tr>
                                <td class="text-center">{{ $index + 1 }}</td>
                                <td>{{ $item->nama_produk }}</td>
                                <td class="text-center">
                                @if($item->status === 'true')
                                    <i class="bi bi-check-circle-fill text-success"></i>
                                @else
                                    <i class="bi bi-x-circle-fill text-danger"></i>
                                @endif
                            </td>                          
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @endif
            </div>          
        
        </div>

    </div>
    </div>
    @endif
    @endisset

  </div>
</div>

@endsection

@push('scripts')
<script>
  $(document).ready(function () {
    $('#nasabah-select').select2({
      placeholder: "---Pilih Nama Nasabah---",
      width: '100%'
    });

    $('#nasabah-select').on('change', function () {
      let selectedUrl = $(this).val();
      if (selectedUrl) {
        window.location.href = selectedUrl;
      }
    });
  });
</script>
@endpush