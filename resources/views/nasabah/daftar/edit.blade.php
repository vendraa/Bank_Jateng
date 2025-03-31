@extends('layouts.app')

@section('content')

<div class="pagetitle">
    <h1>Edit Data Nasabah</h1>
    <nav style="--bs-breadcrumb-divider: '|';">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('nasabah.index') }}">Daftar Nasabah</a></li>
            <li class="breadcrumb-item active">Edit</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title text-center">Edit Data Nasabah</h5>

                    <!-- Form Edit Nasabah -->
                    <form class="row g-3" action="{{ route('nasabah.update', $nasabah->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="col-md-12">
                            <div class="form-floating">
                                <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                       id="floatingName" name="name" placeholder="Nama Nasabah"
                                       value="{{ old('name', $nasabah->name) }}">
                                <label for="floatingName">Nama</label>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control @error('npwp') is-invalid @enderror"
                                       id="floatingNpwp" name="npwp" placeholder="NPWP"
                                       value="{{ old('npwp', $nasabah->npwp) }}">
                                <label for="floatingNpwp">NPWP</label>
                                @error('npwp')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control @error('business_sector') is-invalid @enderror"
                                       id="floatingBusiness" name="business_sector" placeholder="Sektor Usaha"
                                       value="{{ old('business_sector', $nasabah->business_sector) }}">
                                <label for="floatingBusiness">Sektor Usaha</label>
                                @error('business_sector')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-floating">
                                <textarea class="form-control @error('address') is-invalid @enderror"
                                          placeholder="Alamat" id="floatingAddress" name="address"
                                          style="height: 100px;">{{ old('address', $nasabah->address) }}</textarea>
                                <label for="floatingAddress">Alamat</label>
                                @error('address')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control @error('key_person') is-invalid @enderror"
                                       id="floatingKeyPerson" name="key_person" placeholder="Key Person"
                                       value="{{ old('key_person', $nasabah->key_person) }}">
                                <label for="floatingKeyPerson">Key Person</label>
                                @error('key_person')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control @error('phone_number') is-invalid @enderror"
                                       id="floatingPhone" name="phone_number" placeholder="Nomor Telepon"
                                       value="{{ old('phone_number', $nasabah->phone_number) }}">
                                <label for="floatingPhone">Nomor Telepon</label>
                                @error('phone_number')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="d-flex justify-content-end gap-2 mt-4">
                            <button type="submit" class="btn btn-primary">Save</button>
                            <a href="{{ route('nasabah.index') }}" class="btn btn-secondary">Cancel</a>
                        </div>
                    </form>>

                </div>
            </div>
        </div>
    </div>
</section>

@endsection
