@extends('layouts.app')

@section('content')

    <div class="pagetitle">
      <h1>Daftar Nasabah</h1>
      <nav style="--bs-breadcrumb-divider: '|';">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
          <li class="breadcrumb-item">Daftar Nasabah</li>
        </ol>
      </nav>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Daftar Nasabah</h5>
                    <p>Berikut adalah daftar nasabah yang telah terdaftar.</p>

                    <!-- Table with stripped rows -->
                    <table class="table datatable table-hover">
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
                                                    <a class="dropdown-item" href="{{ route('phr.create', $nasabah->id) }}">
                                                        <i class="bi bi-file-earmark-plus"></i> Input PHR
                                                    </a>
                                                </li>
                                                <li>
                                                    <button type="button"
                                                        class="dropdown-item text-danger"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#deleteModal"
                                                        data-id="{{ $nasabah->id }}"
                                                        data-nama="{{ $nasabah->name }}">
                                                        <i class="bi bi-trash"></i> Hapus
                                                    </button>
                                                </li>                                                                                                
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>                    

                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title" id="deleteModalLabel">Konfirmasi Hapus</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Apakah Anda yakin ingin menghapus <strong id="jobToDelete"></strong>?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <form id="delete-form" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>    

    @if (session('phr_success'))
    <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-success text-white">
                    <h5 class="modal-title" id="successModalLabel">Berhasil</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                </div>
                <div class="modal-body">
                    <p>{{ session('phr_success') }}</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
    @endif

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const deleteButtons = document.querySelectorAll('button[data-bs-target="#deleteModal"]');
            const deleteModal = document.getElementById('deleteModal');
            const jobToDelete = deleteModal.querySelector('#jobToDelete');
            const form = deleteModal.querySelector('#delete-form');

            deleteButtons.forEach(button => {
                button.addEventListener('click', function () {
                    const nama = this.getAttribute('data-nama');
                    const id = this.getAttribute('data-id');
    
                    console.log('DEBUG:', nama, id); 
    
                    jobToDelete.textContent = nama ? nama : '[nama tidak ditemukan]';
    
                    form.action = `/daftar-nasabah/delete/${id}`;
                });
            });
    
            const successModal = document.getElementById("successModal");
            if (successModal) {
                const bsModal = new bootstrap.Modal(successModal);
                bsModal.show();
            }
        });
    </script>      

@endsection
