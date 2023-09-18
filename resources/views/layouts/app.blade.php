<!DOCTYPE html>

<html lang="en">
<head>
    <title>My Tasks</title>

    @vite(['resources/js/app.js'])

    @yield('styles')
</head>
<body>
    <h1>@yield('title')</h1>

    <div>
        @if( session()->has('success') )
            <div>{{ session('success') }}</div>
        @endif

        @yield('content')
    </div>
</body>
</html>
