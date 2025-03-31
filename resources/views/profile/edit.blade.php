@extends('layouts.app')

@section('content')
<div class="pagetitle">
    <h1>Profile</h1>
    <nav style="--bs-breadcrumb-divider: '|';">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route( 'dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">Profile</li>
        </ol>
    </nav>
</div>

<section class="section profile">
    <div class="row">
        <div class="col-xl-4">
            <div class="card">
                <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                    <img src="{{ Auth::user()->avatar }}" alt="Profile" class="rounded-circle"
                    style="width: 256px; height: 128px; border-radius: 50%; object-fit: cover;">
                    <h2>{{ Auth::user()->name }}</h2>
                    <h3>{{ Auth::user()->username }}</h3>
                </div>
            </div>
        </div>

        <div class="col-xl-8">
            <div class="card">
                <div class="card-body pt-3">
                    <ul class="nav nav-tabs nav-tabs-bordered d-flex">
                        <li class="nav-item flex-fill">
                            <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
                        </li>
                        <li class="nav-item flex-fill">
                            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
                        </li>
                        <li class="nav-item flex-fill">
                            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change Password</button>
                        </li>
                        <li class="nav-item flex-fill">
                            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-delete">Delete Account</button>
                        </li>
                    </ul>

                    <div class="tab-content pt-2">
                        <div class="tab-pane fade show active profile-overview" id="profile-overview">
                            <h5 class="card-title">Profile Details</h5>
                            <p class="small">Berikut adalah Detail Profile Anda.</p>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label ">Full Name</div>
                                <div class="col-lg-9 col-md-8">{{ Auth::user()->name }}</div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label ">Username</div>
                                <div class="col-lg-9 col-md-8">{{ Auth::user()->username }}</div>
                            </div>

                        </div>

                        <div class="tab-pane fade profile-edit pt-3" id="profile-edit">
                            <form action="{{ route('profile.update', Auth::user()->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')
                        
                                <div class="row mb-3">
                                    <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                                    <div class="col-md-8 col-lg-9 text-center">
                                        <img id="avatar-preview" 
                                        src="{{ Auth::user()->avatar }}" 
                                        data-default-avatar="{{ \Laravolt\Avatar\Facade::create(Auth::user()->name)->toBase64() }}"
                                        alt="Profile Picture"
                                        style="width: 128px; height: 128px; border-radius: 50%; object-fit: cover;">                                                                        
                        
                                        <input type="hidden" id="delete-avatar" name="delete_avatar" value="0">
                        
                                        <div class="pt-2">
                                            <label for="avatar-input" class="btn btn-primary btn-sm">
                                                <i class="bi bi-upload" style="color: white;"></i>
                                            </label>                                            
                                            <input type="file" id="avatar-input" name="avatar" class="d-none" accept="image/*" onchange="previewAvatar(event)">
                        
                                            <button type="button" class="btn btn-danger btn-sm" onclick="removeAvatar()">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                        
                                <div class="row mb-3">
                                    <label class="col-md-4 col-lg-3 col-form-label">Full Name</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input type="text" class="form-control" name="name" value="{{ Auth::user()->name }}">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-md-4 col-lg-3 col-form-label">Username</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input type="text" class="form-control" name="username" value="{{ Auth::user()->username }}">
                                    </div>
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">Save Changes</button>
                                </div>
                            </form>
                        </div>
                        
                        <div class="tab-pane fade pt-3" id="profile-change-password">
                            <form action="{{ route('profile.password', Auth::user()->id) }}" method="POST">
                                @csrf
                                <div class="row mb-3">
                                    <label class="col-md-4 col-lg-4 col-form-label">Current Password</label>
                                    <div class="col-md-8 col-lg-8">
                                        <input type="password" class="form-control @error('current_password') is-invalid @enderror" name="current_password" required>
                                        @error('current_password')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            
                                <div class="row mb-3">
                                    <label class="col-md-4 col-lg-4 col-form-label">New Password</label>
                                    <div class="col-md-8 col-lg-8">
                                        <input type="password" class="form-control @error('new_password') is-invalid @enderror" name="new_password" required>
                                        @error('new_password')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            
                                <div class="row mb-3">
                                    <label class="col-md-4 col-lg-4 col-form-label">Confirm New Password</label>
                                    <div class="col-md-8 col-lg-8">
                                        <input type="password" class="form-control" name="new_password_confirmation" required>
                                    </div>
                                </div>
                            
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">Change Password</button>
                                </div>
                            </form>                            
                        </div>

                        <div class="tab-pane fade pt-3" id="profile-delete">
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <i class="bi bi-exclamation-octagon me-1"></i>
                                Warning: Deleting your account is permanent and cannot be undone. All your data will be erased.
                            </div>

                            <div class="text-center">
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal">
                                    Delete My Account
                                </button>
                            </div>
                        </div>

                        <div class="modal fade" id="confirmDeleteModal" tabindex="-1">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title text-danger">Confirm Account Deletion</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Are you sure you want to delete your account? This action is permanent and cannot be undone.</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>

                                        <form action="{{ route( 'profile.delete', Auth::user()->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Yes, Delete My Account</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection