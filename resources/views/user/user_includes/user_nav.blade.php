@section('user_nav')

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="{{ route('landing.view') }}">
            <img src="{{ asset('almlogoinverted.png') }}" alt="Logo" height="40">
            Management
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" 
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="btn btn-light ml-3" href="{{ route('login.view') }}">logout</a>
                </li>
                <!-- <li class="nav-item">
                    <a class="btn btn-light ml-3" href="{{ route('register.view') }}">Register</a>
                </li> -->
            </ul>
        </div>
    </div>
</nav>