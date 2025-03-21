@extends('layouts.app')

@section('content')

    <div class="pagetitle">
      <h1>Data Nasabah</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Data</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <div class="row">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title text-center">Input Data Nasabah</h5>

                <!-- Floating Labels Form -->
                <form class="row g-3" action="{{ route('store') }}" method="POST">
                    @csrf

                    <div class="col-md-12">
                        <div class="form-floating">
                            <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                   id="floatingName" name="name" placeholder="Your Name"
                                   value="{{ old('name') }}">
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
                                   value="{{ old('npwp') }}">
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
                                   value="{{ old('business_sector') }}">
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
                                      style="height: 100px;">{{ old('address') }}</textarea>
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
                                   value="{{ old('key_person') }}">
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
                                   value="{{ old('phone_number') }}">
                            <label for="floatingPhone">Nomor Telepon</label>
                            @error('phone_number')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <button type="submit" class="btn btn-primary">Save</button>
                        <button type="submit" class="btn btn-primary" name="create_another" value="true">Save & Create Another</button>
                        <button type="reset" class="btn btn-secondary">Cancel</button>
                    </div>
                </form><!-- End floating Labels Form -->

            </div>
        </div>
    </div>

@endsection
