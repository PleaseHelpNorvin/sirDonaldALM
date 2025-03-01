@extends('landing_layouts.landing_index')

@section('content')
<div class="container mt-5">
    <div class="card shadow-lg">
        <div class="card-header bg-dark text-white text-center">
            <h4>Login</h4>
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

            <!-- Error Box for Invalid Credentials -->
            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            <form class="needs-validation" action="{{ route('authenticate') }}" method="POST" novalidate>
                @csrf 

                <div class="mb-3">
                    <label for="email" class="form-label">Email Address</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required>
                    <div class="invalid-feedback">
                        @error('email') {{ $message }} @else Please enter a valid email. @enderror
                    </div>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <div class="input-group">
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required>
                        <button type="button" class="btn btn-outline-secondary" onclick="togglePassword('password')">
                            <i class="fas fa-eye"></i>
                        </button>
                    </div>
                    <div class="invalid-feedback">
                        @error('password') {{ $message }} @else Password is required. @enderror
                    </div>
                </div>

                <div class="form-check mb-3">
                    <input type="checkbox" class="form-check-input" id="remember" name="remember">
                    <label class="form-check-label" for="remember">Remember me</label>
                </div>

                <button type="submit" class="btn btn-dark w-100">Login</button>
            </form>
        </div>

        <div class="card-footer text-center">
            <small>Don't have an account? <a href="{{ route('register.view') }}">Register here</a></small>
        </div>
    </div>
</div>

<script>
function togglePassword(fieldId) {
    var field = document.getElementById(fieldId);
    var toggleButton = field.nextElementSibling.querySelector("i"); // Get the icon inside the button

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
