@extends('landing_layouts.landing_index')

@section('content')
<div class="container mt-5">
    <div class="card shadow-lg">
        <div class="card-header bg-dark text-white text-center">
            <h4>Login</h4>
        </div>
        <div class="card-body">
            <form class="needs-validation" novalidate>
                <div class="mb-3 ">
                    <label for="email" class="form-label">Email Address</label>
                    <input type="email" class="form-control" id="email" required>
                    <div class="invalid-feedback">Please enter a valid email.</div>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" required>
                    <div class="invalid-feedback">Password is required.</div>
                </div>

                <div class="form-check mb-3">
                    <input type="checkbox" class="form-check-input" id="remember">
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
@endsection
