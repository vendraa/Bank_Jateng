@extends('layouts.app')

@section('content')

    <div class="pagetitle">
      <h1>Daftar Nasabah</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Daftar</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Daftar Nasabah</h5>
                    <p>Berikut adalah daftar nasabah yang telah terdaftar.</p>

                    <!-- Table with stripped rows -->
                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>NPWP</th>
                                <th>Sektor Usaha</th>
                                <th>Alamat</th>
                                <th>Key Person</th>
                                <th>Nomor Telepon</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($daftarNasabah as $index => $nasabah)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $nasabah->name }}</td>
                                    <td>{{ $nasabah->npwp }}</td>
                                    <td>{{ $nasabah->business_sector }}</td>
                                    <td>{{ $nasabah->address }}</td>
                                    <td>{{ $nasabah->key_person }}</td>
                                    <td>{{ $nasabah->phone_number }}</td>
                                    <td class="text-center">
                                        <div class="dropdown">
                                            <button style="border: none; background: none" type="button" id="dropdownMenuButton{{ $nasabah->id }}" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="bi bi-three-dots"></i>
                                            </button>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton{{ $nasabah->id }}">
                                                <li>
                                                    <a class="dropdown-item" href="{{ route('nasabah.edit', $nasabah->id) }}">
                                                        <i class="bi bi-pencil-square"></i> Edit
                                                    </a>
                                                </li>
                                                <li>
                                                    <form action="{{ route('nasabah.destroy', $nasabah->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="dropdown-item text-danger">
                                                            <i class="bi bi-trash"></i> Hapus
                                                        </button>
                                                    </form>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>                    
                    <!-- End Table with stripped rows -->

                </div>
            </div>
        </div>
    </div>
@endsection
