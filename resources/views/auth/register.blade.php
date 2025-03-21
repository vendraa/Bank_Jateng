<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Sign Up | Bank Jateng</title>

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/quill/quill.snow.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/simple-datatables/style.css') }}" rel="stylesheet">
  
  <!-- Template Main CSS File -->
  <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
</head>

<body>
  <main>
    <div class="container">
      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href="{{ route('register') }}" class="logo d-flex align-items-center w-auto">
                  <img src="assets/img/logo.png" alt="">
                  <span class="d-none d-lg-block">Bank Jateng</span>
                </a>
              </div>

              <div class="card mb-3">
                <div class="card-body">
                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Create Your Account</h5>
                    <p class="text-center small">Fill in the details to get started</p>
                  </div>
                  <form method="POST" action="{{ route('register') }}" class="row g-3 needs-validation" novalidate>
                    @csrf
                    <div class="col-12">
                      <label for="name" class="form-label">Full Name</label>
                      <input id="name" class="form-control @error('name') is-invalid @enderror" type="text" name="name" value="{{ old('name') }}" required placeholder="Enter your full name">
                      @error('name')
                      <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>
                    <div class="col-12">
                      <label for="username" class="form-label">Username</label>
                      <input id="username" class="form-control @error('username') is-invalid @enderror" type="text" name="username" value="{{ old('username') }}" required placeholder="Enter your username">
                      @error('username')
                      <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>
                    <div class="col-12">
                      <label for="email" class="form-label">Email</label>
                      <input id="email" class="form-control @error('email') is-invalid @enderror" type="email" name="email" value="{{ old('email') }}" required placeholder="Enter your email">
                      @error('email')
                      <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>
                    <div class="col-12">
                      <label for="password" class="form-label">Password</label>
                      <input id="password" class="form-control @error('password') is-invalid @enderror" type="password" name="password" required placeholder="Enter password">
                      @error('password')
                      <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>
                    <div class="col-12">
                      <label for="password_confirmation" class="form-label">Confirm Password</label>
                      <input id="password_confirmation" class="form-control" type="password" name="password_confirmation" required placeholder="Confirm password">
                    </div>
                    <div class="col-12 mt-4">
                      <button type="submit" class="btn btn-primary w-100">Sign Up</button>
                    </div>
                    <div class="col-12 text-center">
                      <p class="small mb-0">Already have an account? <a href="{{ route('login') }}">Log in</a></p>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
  </main>
  
  <!-- Vendor JS Files -->
  <script src="{{ asset('assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/chart.js/chart.umd.js') }}"></script>
  <script src="{{ asset('assets/vendor/echarts/echarts.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/quill/quill.js') }}"></script>
  <script src="{{ asset('assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
  <script src="{{ asset('assets/vendor/tinymce/tinymce.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('assets/js/main.js') }}"></script>
</body>
</html>
