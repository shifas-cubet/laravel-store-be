@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="text-center">
            <h2>Email Verified</h2>
            <p>Your email has been successfully verified.</p>
        </div>
    </div>

    <script>
        setTimeout(function() {
            window.location.href = 'http://localhost:5174/login';
        }, 2000); // 2000 milliseconds = 2 seconds
    </script>


@endsection
