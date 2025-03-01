@extends('user.user_layouts.user_index')

@section('user_content')
<div class="container-fluid mt-4">
    <div class="row justify-content-center"> <!-- Centering the content -->
        <div class="col-12"> <!-- Full width -->
            <div class="card shadow-sm p-4 w-100"> <!-- `w-100` makes it 100% width -->
                <h2 class="text-center">Welcome {{ Auth::user()->name }}<h2>
                <p class="text-muted text-center">Manage your profile, settings, and more.</p>
            </div>
        </div>
    </div>
</div>
@endsection
