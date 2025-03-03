@extends('landing_layouts.landing_index')

@section('content')
    <div class="container text-center mt-5">
        <h1 class="fw-bold">Welcome to the Home Page</h1>
        <p class="lead">Explore our platform and enjoy our services.</p>
        <a href="{{ route('register.view') }}" class="btn btn-primary mt-3">Get Started</a>
    </div>
@endsection