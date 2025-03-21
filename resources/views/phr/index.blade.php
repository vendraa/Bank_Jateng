@extends('layouts.app')

@section('content')

    <div class="pagetitle">
      <h1>Output PHR</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">PHR</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">PHR Nasabah</h5>

                    <div class="row mb-3">
                        <div class="col-sm-12">
                          <select class="form-select" aria-label="Default select example">
                            <option selected>Pilih Nama Nasabah</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                          </select>
                        </div>
                    </div>
                </div>

            </div>

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Output PHR</h5>
      
                    <!-- Bordered Tabs Justified -->
                    <ul class="nav nav-tabs nav-tabs-bordered d-flex" id="borderedTabJustified" role="tablist">
                        <li class="nav-item flex-fill" role="presentation">
                            <button class="nav-link w-100 active" id="home-tab" data-bs-toggle="tab" data-bs-target="#bordered-justified-home" type="button" role="tab" aria-controls="bordered-justified-home" aria-selected="true">Tabungan</button>
                        </li>
                        <li class="nav-item flex-fill" role="presentation">
                            <button class="nav-link w-100" id="profile-tab" data-bs-toggle="tab" data-bs-target="#bordered-justified-profile" type="button" role="tab" aria-controls="bordered-justified-profile" aria-selected="false">Fasilitas Kredit</button>
                        </li>
                        <li class="nav-item flex-fill" role="presentation">
                            <button class="nav-link w-100" id="contact-tab" data-bs-toggle="tab" data-bs-target="#bordered-justified-contact" type="button" role="tab" aria-controls="bordered-justified-contact" aria-selected="false">Payroll Pegawai</button>
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
                      <div class="tab-pane fade show active" id="bordered-justified-home" role="tabpanel" aria-labelledby="home-tab">
                        <table class="table table-striped">
                            <thead>
                              <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama Bank</th>
                                <th scope="col">Rekening</th>
                                <th scope="col">Saldo</th>
                                <th scope="col">Keterangan</th>
                                <th scope="col">Posisi</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <th scope="row">1</th>
                                <td>Bank Jateng</td>
                                <td>10061321</td>
                                <td>Rp7.000.000</td>
                                <td>Giro</td>
                                <td>10 February 2025</td>
                              </tr>
                              <tr>
                                <th scope="row">2</th>
                                <td>BSI</td>
                                <td>1212232</td>
                                <td>Rp70.000.000</td>
                                <td>Tabungan</td>
                                <td>28 February 2025</td>
                              </tr>
                            </tbody>
                          </table>
                      </div>
                      <div class="tab-pane fade" id="bordered-justified-profile" role="tabpanel" aria-labelledby="profile-tab">
                        <table class="table table-striped">
                            <thead>
                              <tr>
                                <th scope="col">No</th>
                                <th scope="col">Kreditur</th>
                                <th scope="col">Plafond</th>
                                <th scope="col">Saldo Debit</th>
                                <th scope="col">Waktu Awal</th>
                                <th scope="col">Waktu Akhir</th>
                                <th scope="col">Suku Bunga</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <th scope="row">1</th>
                                <td>Bank Jateng</td>
                                <td>Rp10.000.000</td>
                                <td>Rp7.000.000</td>
                                <td>5 February 2024</td>
                                <td>10 February 2025</td>
                                <td>10%</td>
                              </tr>
                              <tr>
                                <th scope="row">2</th>
                                <td>BSI</td>
                                <td>Rp10.000.000</td>
                                <td>Rp7.000.000</td>
                                <td>5 February 2024</td>
                                <td>10 February 2025</td>
                                <td>10%</td>
                              </tr>
                            </tbody>
                        </table>
                      </div>
                      <div class="tab-pane fade" id="bordered-justified-contact" role="tabpanel" aria-labelledby="contact-tab">
                        <table class="table table-striped">
                            <thead>
                              <tr>
                                <th scope="col">No</th>
                                <th scope="col">Payroll Bank</th>
                                <th scope="col">NoA Pegawai</th>
                                <th scope="col">Nominal Payroll</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <th scope="row">1</th>
                                <td>Bank Jateng</td>
                                <td>50</td>
                                <td>Rp7.000.000</td>
                              </tr>
                              <tr>
                                <th scope="row">2</th>
                                <td>BSI</td>
                                <td>100</td>
                                <td>Rp7.000.000</td>
                              </tr>
                            </tbody>
                        </table>
                      </div>
                      <div class="tab-pane fade" id="bordered-justified-plo_pegawai" role="tabpanel" aria-labelledby="plo_pegawai-tab">
                        <table class="table table-striped">
                            <thead>
                              <tr>
                                <th scope="col">NoA</th>
                                <th scope="col">Plafond</th>
                                <th scope="col">Baki Debit</th>
                                <th scope="col">Angsuran per Bulan</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <th scope="row">50</th>
                                <td>Rp100.000.000</td>
                                <td>Rp1.000.000</td>
                                <td>Rp100.000</td>
                              </tr>
                            </tbody>
                        </table>
                      </div>
                      <div class="tab-pane fade" id="bordered-justified-bima_mobile" role="tabpanel" aria-labelledby="bima_mobile-tab">
                        <table class="table table-striped">
                            <thead>
                              <tr class="text-center">
                                <th scope="col">Aktif BIMA Mobile</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr class="text-center">
                                <th>500</th>
                              </tr>
                            </tbody>
                        </table>
                      </div>
                      <div class="tab-pane fade" id="bordered-justified-dplk" role="tabpanel" aria-labelledby="dplk-tab">
                        <table class="table table-striped">
                            <thead>
                              <tr>
                                <th scope="col">Jumlah Peserta</th>
                                <th>Akumulasi Iuran</th>
                                <th>Akumulasi Pengembangan</th>
                                <th>Total Saldo</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <th>500</th>
                                <th>Rp40.000.000</th>
                                <th>Rp5.000.000</th>
                                <th>Rp300.000.000</th>
                              </tr>
                            </tbody>
                        </table>
                      </div>
                      <div class="tab-pane fade" id="bordered-justified-phr_lain" role="tabpanel" aria-labelledby="phr_lain-tab">
                        <table class="table table-striped">
                            <thead>
                              <tr>
                                <th scope="col">No</th>
                                <th>Product Holding</th>
                                <th>Keterangan</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <th>1</th>
                                <th>QRIS Rekening Bank Jateng</th>
                                <th>√</th>
                              </tr>
                            </tbody>
                        </table>
                      </div>
                    </div><!-- End Bordered Tabs Justified -->
                </div>
            </div>

        </div>

    </div>
@endsection
