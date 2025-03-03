@extends('landing_layouts.landing_index')

@section('content')
    <div class="container mt-5">
        <div class="card shadow-lg">
            <div class="card-header bg-dark text-white text-center">
                <h4>Register</h4>
            </div>

            <div class="card-body">
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

                    <!-- Row 1: Name -->
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="last_name" class="form-label">Last Name</label>
                            <input type="text" name="last_name" id="last_name" class="form-control @error('last_name') is-invalid @enderror" value="{{ old('last_name') }}" required>
                            <div class="invalid-feedback">@error('last_name') {{ $message }} @else Last name is required. @enderror</div>
                        </div>
                        <div class="col-md-4">
                            <label for="first_name" class="form-label">First Name</label>
                            <input type="text" name="first_name" id="first_name" class="form-control @error('first_name') is-invalid @enderror" value="{{ old('first_name') }}" required>
                            <div class="invalid-feedback">@error('first_name') {{ $message }} @else First name is required. @enderror</div>
                        </div>
                        <div class="col-md-4">
                            <label for="middle_name" class="form-label">Middle Name</label>
                            <input type="text" name="middle_name" id="middle_name" class="form-control @error('middle_name') is-invalid @enderror" value="{{ old('middle_name') }}">
                            <div class="invalid-feedback">@error('middle_name') {{ $message }} @else Middle name is optional. @enderror</div>
                        </div>
                    </div>

                    <!-- Row 2: Gender, Birthdate, Address -->
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="gender" class="form-label">Gender</label>
                            <select name="gender" id="gender" class="form-control @error('gender') is-invalid @enderror" required>
                                <option value="" disabled selected>Select Gender</option>
                                <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
                                <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
                                <option value="other" {{ old('gender') == 'other' ? 'selected' : '' }}>Other</option>
                            </select>
                            <div class="invalid-feedback">@error('gender') {{ $message }} @else Gender is required. @enderror</div>
                        </div>
                        <div class="col-md-4">
                            <label for="birthdate" class="form-label">Birthdate</label>
                            <input type="date" name="birthdate" id="birthdate" class="form-control @error('birthdate') is-invalid @enderror" value="{{ old('birthdate') }}" required>
                            <div class="invalid-feedback">@error('birthdate') {{ $message }} @else Birthdate is required. @enderror</div>
                        </div>
                        <div class="col-md-4">
                            <label for="address" class="form-label">Address</label>
                            <input type="text" name="address" id="address" class="form-control @error('address') is-invalid @enderror" value="{{ old('address') }}" required>
                            <div class="invalid-feedback">@error('address') {{ $message }} @else Address is required. @enderror</div>
                        </div>
                    </div>

                    <!-- Row 3: Email, Contact No, Username -->
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required>
                            <div class="invalid-feedback">@error('email') {{ $message }} @else Please enter a valid email. @enderror</div>
                        </div>
                        <div class="col-md-4">
                            <label for="contact_no" class="form-label">Contact No</label>
                            <input type="text" name="contact_no" id="contact_no" class="form-control @error('contact_no') is-invalid @enderror" value="{{ old('contact_no') }}" required>
                            <div class="invalid-feedback">@error('contact_no') {{ $message }} @else Contact number is required. @enderror</div>
                        </div>
                        <div class="col-md-4">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" name="username" id="username" class="form-control @error('username') is-invalid @enderror" value="{{ old('username') }}" required>
                            <div class="invalid-feedback">@error('username') {{ $message }} @else Username is required. @enderror</div>
                        </div>
                    </div>

                    <!-- Row 4: Password, Confirm Password -->
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="password" class="form-label">Password</label>
                            <div class="input-group">
                                <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" required>
                                <button type="button" class="btn btn-outline-secondary" onclick="togglePassword('password')">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                            <small class="text-muted">Must contain uppercase, lowercase, number, and special character.</small>
                            <div class="invalid-feedback">@error('password') {{ $message }} @else Password is required. @enderror</div>
                        </div>
                        <div class="col-md-6">
                            <label for="password_confirmation" class="form-label">Confirm Password</label>
                            <div class="input-group">
                                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
                                <button type="button" class="btn btn-outline-secondary" onclick="togglePassword('password_confirmation')">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                            <div class="invalid-feedback">Password confirmation is required.</div>
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
