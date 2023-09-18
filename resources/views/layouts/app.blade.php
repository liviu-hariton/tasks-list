<!doctype html>
<html lang="en" data-bs-theme="auto">
<head><script src="../assets/js/color-modes.js"></script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>My Tasks</title>

    @vite(['resources/js/app.js'])

    @yield('styles')
</head>
<body>
    <div class="col-lg-8 mx-auto p-4 py-md-5">
        <header class="d-flex align-items-center pb-3 mb-5 border-bottom">
            <a href="/" class="d-flex align-items-center text-body-emphasis text-decoration-none">
                <i class="fab fa-bootstrap fa-2xl"></i> <span class="fs-4">My Tasks</span>
            </a>
        </header>

        <main>
            <h1>@yield('title')</h1>

            <div>
                @if( session()->has('success') )
                    <div class="alert alert-info">{{ session('success') }}</div>
                @endif

                @yield('content')
            </div>
        </main>
    </div>
</body>
</html>
