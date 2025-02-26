@section('user_footer')
<footer class="bg-dark text-light py-1 mt-5">
    <div class="container text-center">
        <p class="mb-2">&copy; {{ date('Y') }} MyWebsite. All Rights Reserved.</p>
        <ul class="list-inline">
            <!-- <li class="list-inline-item"><a href="{{ url('/') }}" class="text-light">Home</a></li>
            <li class="list-inline-item"><a href="{{ url('/about') }}" class="text-light">About</a></li>
            <li class="list-inline-item"><a href="{{ url('/services') }}" class="text-light">Services</a></li>
            <li class="list-inline-item"><a href="{{ url('/contact') }}" class="text-light">Contact</a></li> -->
        </ul>
        <div class="mt-2">
            <a href="#" class="text-light mx-2"><i class="fab fa-facebook"></i></a>
            <a href="#" class="text-light mx-2"><i class="fab fa-twitter"></i></a>
            <a href="#" class="text-light mx-2"><i class="fab fa-instagram"></i></a>
        </div>
    </div>
</footer>