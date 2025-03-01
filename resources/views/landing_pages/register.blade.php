@extends('landing_layouts.landing_index')

@section('content')
    <div class="container mt-5">
        <div class="card shadow-lg">
            <div class="card-header bg-dark text-white text-center">
                <h4>Register</h4>
            </div>

            <div class="card-body">
                <!-- Error Box for Validation Messages -->
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form class="needs-validation" action="{{ route('register.submit') }}" method="POST" novalidate>
                    @csrf

                    <div class="mb-3">
                        <label for="name" class="form-label">Full Name</label>
                        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required>
                        <div class="invalid-feedback">
                            @error('name') {{ $message }} @else Full name is required. @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email Address</label>
                        <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required>
                        <div class="invalid-feedback">
                            @error('email') {{ $message }} @else Please enter a valid email. @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <div class="input-group">
                            <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" required>
                            <button type="button" class="btn btn-outline-secondary" onclick="togglePassword('password')">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                        <small class="text-muted">Must contain uppercase, lowercase, number, and special character.</small>
                        <div class="invalid-feedback">
                            @error('password') {{ $message }} @else Password is required. @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">Confirm Password</label>
                        <div class="input-group">
                            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
                            <button type="button" class="btn btn-outline-secondary" onclick="togglePassword('password_confirmation')">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                        <div class="invalid-feedback">
                            Password confirmation is required.
                        </div>
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-dark">Register</button>
                    </div>
                </form>
            </div>

            <div class="card-footer text-center">
                <small>Already have an account? <a href="{{ route('login.view') }}">Login here</a></small>
            </div>
        </div>
    </div>

    <script>
        function togglePassword(fieldId) {
            var field = document.getElementById(fieldId);
            var toggleButton = field.nextElementSibling.querySelector("i");

            if (field.type === "password") {
                field.type = "text";
                toggleButton.classList.remove("fa-eye");
                toggleButton.classList.add("fa-eye-slash");
            } else {
                field.type = "password";
                toggleButton.classList.remove("fa-eye-slash");
                toggleButton.classList.add("fa-eye");
            }
        }
    </script>
@endsection
