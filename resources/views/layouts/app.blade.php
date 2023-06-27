<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Task Management App</title>
    <!-- Add the Bootstrap CDN link below -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @stack('styles')
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="{{ route('tasks.index') }}">Task Management App</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('tasks.index') }}">Tasks</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('projects.index') }}">Projects</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container mt-4">
    @yield('content')
</div>

<script src="{{ asset('js/app.js') }}"></script>
@stack('scripts')
</body>
</html>
