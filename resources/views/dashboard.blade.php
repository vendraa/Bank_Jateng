@extends('layouts.app')

@section('content')
    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav style="--bs-breadcrumb-divider: '|';">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
          <li class="breadcrumb-item">Dashboard</li>
        </ol>
      </nav>
    </div>
    
    <h3 class="mb-5">Welcome, {{ Auth::user()->name }}</h3>

    <img src="{{ asset('assets/img/e-product.png') }}" alt="Welcome Image" class="dashboard-image mb-4">
@endsection
